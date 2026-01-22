<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <section class="page-container" aria-labelledby="page-title">
            <div class="page-inner">
                <h2 class="page-title" id="page-title"><?php the_title(); ?></h2>
                <div class="page-content">
                    <div class="page-content-inner"><?php the_time('Y-m-d H:i'); ?></div>
                    <div class="page-content-category"><?php the_category(", "); ?></div>
                    <div class="page-content-content"><?php the_content(); ?></div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>