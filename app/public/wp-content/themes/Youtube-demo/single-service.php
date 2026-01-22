<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post(); ?>

        <section class="servicePost" aria-labelledby="servicePost-title">
            <div class="servicePost-inner">

                <header class="servicePost-head">
                    <p class="servicePost-kicker">SERVICE</p>
                    <h1 class="servicePost-title" id="servicePost-title"><?php the_title(); ?></h1>

                    <div class="servicePost-meta" aria-label="記事情報">
                        <time class="servicePost-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date('Y.m.d')); ?>
                        </time>

                        <?php
                        // CPT側にカテゴリ/タクソノミーが無い場合でも崩れないようにする
                        $terms_html = '';
                        if (get_post_type() === 'post') {
                            $terms_html = get_the_category_list(' ');
                        } else {
                            // よくあるタクソノミー名を順にチェック（無ければ表示しない）
                            foreach (array('service_category', 'service-cat', 'service_categorys', 'category') as $tax) {
                                if (taxonomy_exists($tax)) {
                                    $maybe = get_the_term_list(get_the_ID(), $tax, '', ' ', '');
                                    if (!empty($maybe) && !is_wp_error($maybe)) {
                                        $terms_html = $maybe;
                                        break;
                                    }
                                }
                            }
                        }
                        ?>
                        <?php if (!empty($terms_html)): ?>
                            <div class="servicePost-terms" aria-label="カテゴリ">
                                <?php echo $terms_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()): ?> <!-- wordpressのアイキャッチ画像がある場合 -->
                    <figure class="servicePost-media"> <!-- アイキャッチ画像のサイズを指定 -->
                        <?php the_post_thumbnail('large', array('class' => 'servicePost-thumb', 'loading' => 'lazy')); ?>
                    </figure>
                <?php endif; ?>

                <div class="servicePost-body entry-content">
                    <?php the_content(); ?>
                </div>

                <!-- ページ移動 (navは次への行動を指す) -->
                <nav class="servicePost-actions" aria-label="ページ移動">
                    <a class="servicePost-back" href="<?php echo esc_url(home_url('/service')); ?>">サービス一覧へ戻る</a>

                    <div class="servicePost-pager">
                        <div class="servicePost-prev"><!-- 前へのページ移動 -->
                            <?php previous_post_link('%link', '← 前へ'); ?>
                        </div>
                        <div class="servicePost-next"><!-- 次へのページ移動 -->
                            <?php next_post_link('%link', '次へ →'); ?>
                        </div>
                    </div>
                </nav>

            </div>
        </section>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>