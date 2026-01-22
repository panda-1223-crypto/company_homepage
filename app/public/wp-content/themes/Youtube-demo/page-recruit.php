<?php get_header(); ?>

<main class="recruitPage" aria-labelledby="recruit-title"> <!--　aria-labelledbyは、idに設定しているrecruit-titleを参照している -->
    <section class="recruitPage-inner">
        <header class="recruitPage-head">
            <p class="recruitPage-kicker">採用情報</p>
            <h2 class="recruitPage-title" id="recruit-title">採用について</h2>
            <p class="recruitPage-lead">
                株式会社YumaNakashimaは、ホテル事業、料理教室事業、食材通販事業等の事業を行っています。
            </p>
        </header>

        <div class="recruitPage-body">
            <ul class="recruitPage-list" aria-label="事業内容">
                <?php $args = array(
                    'post_type' => 'service',
                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()): ?>
                    <?php while ($query->have_posts()): ?>
                        <?php $query->the_post(); ?>
                        <li class="recruitPage-item">
                            <h3 class="recruitPage-itemTitle"><?php the_title(); ?></h3>
                            <div class="recruitPage-itemLinkContainer">
                                <a class="recruitPage-itemLink" href="<?php the_permalink(); ?>">詳細を見る</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>

            <section class="recruitPage-career-option" aria-label="採用区分一覧">
                <ul class="recruitPage-career-optionList">
                    <li class="recruitPage-career-optionItem">
                        <h3 class="recruitPage-career-optionItemTitle">新卒採用</h3>
                        <p class="recruitPage-career-optionItemText">新卒採用は、新卒の方を対象に採用を行っています。</p>
                        <div class="recruitPage-career-optionItemLinkContainer">
                            <a class="recruitPage-career-optionItemLink" href="<?php echo home_url('/recruit-detail/new-graduate'); ?>">新卒採用はこちら</a>
                        </div>
                    </li>
                    <li class="recruitPage-career-optionItem">
                        <h3 class="recruitPage-career-optionItemTitle">中途採用</h3>
                        <p class="recruitPage-career-optionItemText">中途採用は、中途の方を対象に採用を行っています。</p>
                        <div class="recruitPage-career-optionItemLinkContainer">
                            <a class="recruitPage-career-optionItemLink" href="<?php echo home_url('/recruit-detail/mid-career'); ?>">中途採用はこちら</a>
                        </div>
                    </li>
                    <li class="recruitPage-career-optionItem">
                        <h3 class="recruitPage-career-optionItemTitle">キャリア採用</h3>
                        <p class="recruitPage-career-optionItemText">キャリア採用は、キャリアの方を対象に採用を行っています。</p>
                        <div class="recruitPage-career-optionItemLinkContainer">
                            <a class="recruitPage-career-optionItemLink" href="<?php echo home_url('/recruit-detail/career'); ?>">キャリア採用はこちら</a>
                        </div>
                    </li>
                </ul>
            </section>

            <div class="recruitPage-cta" role="group" aria-label="採用に関する導線">
                <a class="recruitPage-ctaButton" href="<?php echo esc_url(home_url('/contact')); ?>">
                    お問い合わせはこちら
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>