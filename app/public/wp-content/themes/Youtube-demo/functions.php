<?php
/**
 * Theme functions
 */

/**
 * お問い合わせフォーム送信処理
 * - page-contact.php の form action=admin-post.php と連携
 * - 送信先は WordPress 管理者メール（設定 > 一般）を使用
 */
function ymd_handle_contact_submit(): void
{
    if (!isset($_POST['ymd_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['ymd_contact_nonce'])), 'ymd_contact_submit')) {
        wp_safe_redirect(home_url('/contact/?contact=error'));
        exit;
    }

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $tel = isset($_POST['tel']) ? sanitize_text_field(wp_unslash($_POST['tel'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if ($name === '' || $email === '' || !is_email($email) || $tel === '' || $message === '') {
        wp_safe_redirect(home_url('/contact/?contact=error'));
        exit;
    }

    $to = get_option('admin_email');
    $subject = sprintf('[%s] お問い合わせがありました', wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES));

    $body_lines = array(
        'お問い合わせがありました。',
        '',
        '【お名前】',
        $name,
        '',
        '【メールアドレス】',
        $email,
        '',
        '【電話番号】',
        $tel,
        '',
        '【お問い合わせ内容】',
        $message,
        '',
        '---',
        '送信日時: ' . wp_date('Y-m-d H:i:s'),
        '送信元IP: ' . (isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : ''),
        'UserAgent: ' . (isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'])) : ''),
    );
    $body = implode("\n", $body_lines);

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_safe_redirect(home_url('/contact/?contact=sent'));
        exit;
    }

    wp_safe_redirect(home_url('/contact/?contact=error'));
    exit;
}

add_action('admin_post_nopriv_ymd_contact_submit', 'ymd_handle_contact_submit');
add_action('admin_post_ymd_contact_submit', 'ymd_handle_contact_submit');




