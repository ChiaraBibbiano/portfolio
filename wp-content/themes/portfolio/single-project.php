<?php
/*
 * Template Name: Single Project
 * single-project.php
 */

get_header();

while (have_posts()) : the_post();

    $back_link = get_field('back_link');
    $gallery = get_field('gallery');
    $site_link = get_field('site_link');
    $intro_title = get_field('intro_title');
    $intro_text = get_field('intro_text');
    $gallery_2col = get_field('gallery_2col');
    $demarche_title = get_field('demarche_title');
    $demarche_text = get_field('demarche_text');
    $full_image = get_field('full_image');
    $steps_title = get_field('steps_title');
    $steps_text = get_field('steps_text');
    $gallery_steps = get_field('gallery_steps');
    $pres_title2 = get_field('pres_title2');
    $pres_text2 = get_field('pres_text2');
    $full_image2 = get_field('full_image2');
    $small = get_field('small_title');
    $big = get_field('big_title');

    ?>

    <article class="single-project">
        <div class="single-project__header">
            <h2 id="single-project__title">
                <?= esc_html(get_the_title()); ?>
            </h2>
            <?php if ($back_link && !empty($back_link['url'])) : ?>
                <a href="<?= esc_url($back_link['url']); ?>" class="single-project__back">
                    <?= esc_html($back_link['title']); ?> <span aria-hidden="true">↗</span>
                </a>
            <?php endif; ?>
        </div>

        <!--GALERIE 5 images -->
        <?php if ($gallery) : ?>
            <div class="single-project__mosaic">
                <?php foreach ($gallery as $index => $image) : ?>
                    <div class="single-project__mosaic-item single-project__mosaic-item--<?= $index + 1; ?>">
                        <img
                                src="<?= esc_url($image['url']); ?>"
                                alt="<?= esc_attr($image['alt']); ?>"
                                width="<?= esc_attr($image['width']); ?>"
                                height="<?= esc_attr($image['height']); ?>"
                        />
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($site_link && !empty($site_link['url'])) : ?>
            <div class="single-project__site-link-wrap">
                <a href="<?= esc_url($site_link['url']); ?>"
                   class="single-project__site-link"
                   target="_blank">
                    <?= esc_html($site_link['title']); ?> <span aria-hidden="true">↗</span>
                </a>
            </div>
        <?php endif; ?>

        <!--  PRÉSENTATION  -->
        <div class="single-project__intro">
            <?php if ($intro_title) : ?>
                <h3 class="single-project__section-title">
                    <?= esc_html($intro_title); ?>
                </h3>
            <?php endif; ?>
            <?php if ($intro_text) : ?>
                <div class="single-project__text">
                    <?= wp_kses_post($intro_text); ?>
                </div>
            <?php endif; ?>
        </div>

        <!--  GALERIE 2 COLONNES  -->
        <?php if ($gallery_2col) : ?>
            <div class="single-project__gallery-2col">
                <?php foreach ($gallery_2col as $image) : ?>
                    <div class="single-project__gallery-2col-item">
                        <img
                                src="<?= esc_url($image['url']); ?>"
                                alt="<?= esc_attr($image['alt']); ?>"
                                width="<?= esc_attr($image['width']); ?>"
                                height="<?= esc_attr($image['height']); ?>"
                        />
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!--MA DÉMARCHE -->
        <div class="single-project__demarche">
            <?php if ($demarche_title) : ?>
                <h3 class="single-project__section-title">
                    <?= esc_html($demarche_title); ?>
                </h3>
            <?php endif; ?>
            <?php if ($demarche_text) : ?>
                <div class="single-project__text">
                    <?= wp_kses_post($demarche_text); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- IMAGE full -->
        <?php if ($full_image && !empty($full_image['url'])) : ?>
            <div class="single-project__full-image">
                <img
                        src="<?= esc_url($full_image['url']); ?>"
                        alt="<?= esc_attr($full_image['alt']); ?>"
                        width="<?= esc_attr($full_image['width']); ?>"
                        height="<?= esc_attr($full_image['height']); ?>"
                />
            </div>
        <?php endif; ?>

        <!--  ZIGZAG SVG ÉTAPES  -->
        <div class="single-project__zigzag" aria-hidden="true">
            <svg class="zigzag__svg" viewBox="0 0 750 320" xmlns="http://www.w3.org/2000/svg"
                 preserveAspectRatio="xMidYMid meet">

                <!-- Ligne zigzag -->
                <polyline
                        points="60,80 180,200 370,110 490,270 690,100"
                        fill="none"
                        stroke="#c0392b"
                        stroke-width="1.5"
                        stroke-linejoin="round"
                />

                <!-- Points aux nœuds -->
                <circle cx="60" cy="80" r="3" fill="#c0392b"/>
                <circle cx="180" cy="200" r="3" fill="#c0392b"/>
                <circle cx="370" cy="110" r="3" fill="#c0392b"/>
                <circle cx="490" cy="270" r="3" fill="#c0392b"/>
                <circle cx="690" cy="100" r="3" fill="#c0392b"/>

                <!-- Labels étapes -->
                <text x="40" y="60" class="zigzag__label" text-anchor="start">ANALYSE &amp;</text>
                <text x="40" y="75" class="zigzag__label" text-anchor="start">RECHERCHE</text>

                <text x="155" y="225" class="zigzag__label" text-anchor="start">MOODBOARD</text>

                <text x="330" y="95" class="zigzag__label" text-anchor="start">PROTOTYPE</text>
                <text x="330" y="110" class="zigzag__label" text-anchor="start">UX</text>

                <text x="458" y="295" class="zigzag__label" text-anchor="start">DESIGN</text>
                <text x="458" y="310" class="zigzag__label" text-anchor="start">UI</text>

                <text x="620" y="85" class="zigzag__label" text-anchor="start">DÉVELOPPMENT</text>

            </svg>
        </div>

        <!-- ÉTAPES  -->
        <div class="single-project__steps">
            <?php if ($steps_title) : ?>
                <h2 class="single-project__section-title">
                    <?= esc_html($steps_title); ?>
                </h2>
            <?php endif; ?>
            <?php if ($steps_text) : ?>
                <div class="single-project__text">
                    <?= wp_kses_post($steps_text); ?>
                </div>
            <?php endif; ?>
        </div>

        <!--  GALERIE ÉTAPES 2 COLONNES -->
        <?php if ($gallery_steps) : ?>
            <div class="single-project__gallery-2col">
                <?php foreach ($gallery_steps as $image) : ?>
                    <div class="single-project__gallery-2col-item">
                        <img
                                src="<?= esc_url($image['url']); ?>"
                                alt="<?= esc_attr($image['alt']); ?>"
                                width="<?= esc_attr($image['width']); ?>"
                                height="<?= esc_attr($image['height']); ?>"
                        />
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!--  2e PRÉSENTATION  -->
        <div class="single-project__intro single-project__intro--right">
            <?php if ($pres_title2) : ?>
                <h2 class="single-project__section-title">
                    <?= esc_html($pres_title2); ?>
                </h2>
            <?php endif; ?>
            <?php if ($pres_text2) : ?>
                <div class="single-project__text">
                    <?= wp_kses_post($pres_text2); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- 2e IMAGE full -->
        <?php if ($full_image2 && !empty($full_image2['url'])) : ?>
            <div class="single-project__full-image">
                <img
                        src="<?= esc_url($full_image2['url']); ?>"
                        alt="<?= esc_attr($full_image2['alt']); ?>"
                        width="<?= esc_attr($full_image2['width']); ?>"
                        height="<?= esc_attr($full_image2['height']); ?>"
                />
            </div>
        <?php endif; ?>

    </article>

    <!--  AUTRES PROJETS  -->
    <?php
// WP_Query tous les projets sauf le courant
    $other_projects = new WP_Query([
        'post_type' => 'project',
        'posts_per_page' => 3,
        'post__not_in' => [get_the_ID()],
        'orderby' => 'rand',
        'no_found_rows' => true,
    ]);
    ?>

    <?php if ($other_projects->have_posts()) : ?>
        <section class="related-projects">

            <div class="projects__header">
                <?php if ($small) : ?><p><?= $small ?></p><?php endif; ?>
                <?php if ($big) : ?><h2> <?= $big ?></h2><?php endif; ?>
            </div>

            <div class="related-projects__grid">
                <?php while ($other_projects->have_posts()) : $other_projects->the_post(); ?>

                    <article class="project-card">
                        <a href="<?= esc_url(get_the_permalink()); ?>" class="project-card__link">
                            <p class="project-card__label">
                                <?= esc_html(get_the_title()); ?>
                            </p>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-card__thumb">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'portrait'); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
