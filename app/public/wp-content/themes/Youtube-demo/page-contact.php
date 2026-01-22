<?php get_header(); ?>

<div class="contact-container">
    <?php
    // Contact Form 7のショートコードを呼び出します。
    // IDの部分は、管理画面で発行された実際の数字に書き換えてください。
    echo do_shortcode('[contact-form-7 id="fcb8a89" title="お問い合わせ"]'); 
    ?>
</div>

<?php get_footer(); ?>