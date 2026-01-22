<?php get_header(); ?>
<section class="archive-services-container" aria-labelledby="services-title">
    <div class="archive-services-inner">
        <div class="archive-services-header">
            <h2 class="archive-services-title" id="archive-services-title">サービス一覧</h2>
        </div>
        <div class="archive-services-list">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): ?>
                    <?php the_post(); ?>
                    <div class="archive-services-item">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <text><?php echo esc_html(get_the_title()); ?></text>
                        <?php echo esc_html(get_the_excerpt()); ?>
                        <a href="<?php echo esc_url(the_permalink()); ?>" class="archive-services-link">詳細を見る</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="archive-services-none">サービスがありません。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>    
</section>
<?php get_footer(); ?>