<?php get_header(); ?>
<section class="news-container" aria-labelledby="news-title">
    <div class="news-inner">
        <div class="news-header">
            <h2 class="news-title" id="news-title"><?php single_cat_title(); ?></h2>
        </div>

        <ul class="news-list">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): ?>
                    <?php the_post(); ?>
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
        </ul>
        <div class="news-pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else: ?>
        <p class="news-none">お知らせがありません。</p>
    <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
