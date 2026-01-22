<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <?php
        /**
         * 募集要項（recruit-detail）詳細ページ
         * - ACF がある場合は get_field() を優先
         * - ない場合は post_meta から取得
         */
        $slug = get_post_field('post_name', get_the_ID());

        $category_label = '募集要項';
        if ($slug === 'new-graduate') {
            $category_label = '新卒採用';
        } elseif ($slug === 'mid-career') {
            $category_label = '中途採用';
        } elseif ($slug === 'career') {
            $category_label = 'キャリア採用';
        }

        $get_value = function (string $key) {
            // SCF が有効なら SCF を優先（リンターの未定義警告回避のため call_user_func 経由）
            if (class_exists('SCF')) {
                $scf = call_user_func(array('SCF', 'get'), $key, get_the_ID());
                if ($scf !== null && $scf !== '' && $scf !== array()) {
                    return $scf;
                }
            }

            // 互換用：念のため meta にもフォールバック
            return get_post_meta(get_the_ID(), $key, true);
        };

        // 想定キー（CF / メタ共通）
        $job_title = $get_value('job_title'); // 職種
        $employment_type = $get_value('employment_type'); // 雇用形態
        $salary = $get_value('salary'); // 給与
        $location = $get_value('location'); // 勤務地
        $hours = $get_value('hours'); // 勤務時間
        $holiday = $get_value('holiday'); // 休日休暇
        $benefits = $get_value('benefits'); // 福利厚生
        $requirements = $get_value('requirements'); // 応募資格
        $selection = $get_value('selection_flow'); // 選考フロー

        $render_value = function ($value) {
            if (is_array($value)) {
                $lines = array();
                foreach ($value as $v) {
                    if ($v === null) {
                        continue;
                    }
                    $s = trim((string) $v);
                    if ($s === '') {
                        continue;
                    }
                    $lines[] = esc_html($s);
                }
                return $lines ? implode('<br>', $lines) : '';
            }
            $s = trim((string) $value);
            return $s === '' ? '' : esc_html($s);
        };
        ?>

        <main class="recruitDetail" aria-labelledby="recruitDetail-title">
            <article class="recruitDetail-inner">
                <header class="recruitDetail-head">
                    <p class="recruitDetail-kicker"><?php echo esc_html($category_label); ?></p>
                    <h1 class="recruitDetail-title" id="recruitDetail-title"><?php the_title(); ?></h1>
                    <div class="recruitDetail-actions" role="group" aria-label="応募導線">
                        <a class="recruitDetail-apply" href="<?php echo esc_url(home_url('/contact')); ?>">応募・お問い合わせ</a>
                        <a class="recruitDetail-back" href="<?php echo esc_url(home_url('/recruit')); ?>">採用ページに戻る</a>
                    </div>
                </header>

                <section class="recruitDetail-section" aria-labelledby="recruitDetail-outlineTitle">
                    <h2 class="recruitDetail-sectionTitle" id="recruitDetail-outlineTitle">募集要項</h2>
                    <dl class="recruitDetail-dl">
                        <?php $v = $render_value($job_title); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">職種</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($employment_type); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">雇用形態</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($salary); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">給与</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($location); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">勤務地</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($hours); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">勤務時間</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($holiday); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">休日・休暇</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($benefits); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">福利厚生</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($requirements); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">応募資格</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php $v = $render_value($selection); ?>
                        <?php if ($v !== ''): ?>
                            <div class="recruitDetail-row">
                                <dt class="recruitDetail-dt">選考フロー</dt>
                                <dd class="recruitDetail-dd"><?php echo $v; ?></dd>
                            </div>
                        <?php endif; ?>
                    </dl>

                    <?php
                    $has_any =
                        $render_value($job_title) !== '' ||
                        $render_value($employment_type) !== '' ||
                        $render_value($salary) !== '' ||
                        $render_value($location) !== '' ||
                        $render_value($hours) !== '' ||
                        $render_value($holiday) !== '' ||
                        $render_value($benefits) !== '' ||
                        $render_value($requirements) !== '' ||
                        $render_value($selection) !== '';
                    ?>
                    <?php if (!$has_any): ?>
                        <p class="recruitDetail-note">募集要項の項目は未設定です。本文に記載されている内容をご確認ください。</p>
                    <?php endif; ?>
                </section>

                <section class="recruitDetail-section" aria-labelledby="recruitDetail-bodyTitle">
                    <h2 class="recruitDetail-sectionTitle" id="recruitDetail-bodyTitle">詳細</h2>
                    <div class="recruitDetail-body">
                        <?php the_content(); ?>
                    </div>
                </section>
            </article>
        </main>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>