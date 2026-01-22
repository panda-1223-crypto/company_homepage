<?php get_header(); ?>

<section class="services-container" aria-labelledby="services-title">
    <div class="services-inner">
        <div class="services-header">
            <h2 class="services-title" id="services-title">サービス事例</h2>
            <a href="<?php echo home_url('/service'); ?>" class="services-more">一覧を見る</a>
        </div>
        <div class="services-list">
            <?php $args = array(
                'posts_per_page' => 3,
                'post_type' => 'service',
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()): ?>
                <?php while ($query->have_posts()): ?>
                    <?php $query->the_post(); ?>

                    <div class="services-item">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php echo get_theme_file_uri(file: 'img/no_image.png'); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <text><?php the_title(); ?></text>
                        <a href="<?php the_permalink(); ?>" class="services-link">詳細を見る</a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?> <!-- サブクエリで取得しているため、メインクエリにリセット -->

        </div>
    </div>
</section>

<section class="news-container" aria-labelledby="news-title">
    <div class="news-inner">
        <div class="news-header">
            <h2 class="news-title" id="news-title">お知らせ</h2>
            <a href="<?php echo home_url('/news'); ?>" class="news-more">一覧を見る</a>
        </div>

        <ul class="news-list">
            <?php $args = array(
                'posts_per_page' => 5, // 表示件数
                'post_type' => 'post', // 投稿一覧
                'orderby' => 'date', // 日付で並び替え
                'order' => 'DESC', // 最新順
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()): ?>
                <?php while ($query->have_posts()): ?>
                    <?php $query->the_post(); ?>
                    <li class="news-item">
                        <a href="<?php the_permalink(); ?>" class="news-link">
                            <time class="news-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                            <span class="news-text"><?php the_title(); ?></span>
                            <span class="news-arrow" aria-hidden="true">→</span>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="news-none">お知らせがありません。</p>
            <?php endif; ?>
        </ul>
        <?php wp_reset_postdata(); ?> <!-- サブクエリで取得しているため、メインクエリにリセット -->
</section>
<?php get_footer(); ?>