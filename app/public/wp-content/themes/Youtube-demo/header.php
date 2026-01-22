<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube-demo</title>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/style.css'); ?>">
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header class="header-container" role="banner">
        <h1 class="header-title">
            <a href="<?php echo home_url('/'); ?>">
                株式会社YumaNakashima
            </a>
        </h1>

        <nav class="header-nav">
            <ul class="header-nav-list">
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/'); ?>">
                        ホーム
                    </a>
                </li>
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/news'); ?>">
                        お知らせ
                    </a>
                </li>
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/service'); ?>">
                        サービス
                    </a>
                </li>
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/about'); ?>">
                        会社概要
                    </a>
                </li>
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/recruit'); ?>">
                        採用情報
                    </a>
                </li>
                <li class="header-nav-item">
                    <a href="<?php echo home_url('/contact'); ?>">
                        お問い合わせ
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <?php if (is_front_page()): ?>
        <div class="key-visual">
            <img src="<?php echo get_theme_file_uri(file: 'img/front-visual.jpg'); ?>" alt="Key Visual">
        </div>
    <?php else: ?>
        <?php
        // サブページの見出し（投稿タイプごとに適切なタイトルにする）
        // この処理はPHPファイルごとにどのタイトルを表示するかを制御している
        if (is_singular('service')) { // 投稿が使われるページを指している。その中で今回はserviceの投稿を指している。
            $subpage_title = 'サービス';
        } elseif (is_singular('post') || is_category()) { // お知らせ詳細ページ
            $subpage_title = 'お知らせ';
        } elseif (is_singular('recruit-detail')) { // 採用情報詳細ページ
            $subpage_title = '採用情報詳細';
        } elseif (is_home()) { // ホームページ
            $subpage_title = 'お知らせ一覧';
        } elseif (is_post_type_archive('service')) { // サービス一覧ページ
            $subpage_title = 'サービス一覧';
        } else {
            $subpage_title = get_the_title();
        }
        ?>
        <div class="subPage-container" role="banner" aria-label="<?php echo esc_attr($subpage_title); ?>">
            <div class="subPage-header">
                <nav class="subPage-breadcrumb" aria-label="パンくずリスト">
                    <a class="subPage-breadcrumbLink" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a>
                    <span class="subPage-breadcrumbSep" aria-hidden="true">/</span>
                    <span class="subPage-breadcrumbCurrent"><?php echo esc_html($subpage_title); ?></span>
                </nav>
                <h2 class="subPage-title"><?php echo esc_html($subpage_title); ?></h2>
            </div>
        </div>
    <?php endif; ?>