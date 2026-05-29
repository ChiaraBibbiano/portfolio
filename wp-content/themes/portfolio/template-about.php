<?php
/*
 * Template Name: About
 */

get_header();

$title = get_field('header_title');
$author = get_field('author');
$description = get_field('description');
$pic = get_field('my_picture');
$small = get_field('small_title');
$small2 = get_field('small_title2');
$big = get_field('big_title');
$big2 = get_field('big_title2');
$job = get_field('job');
$careers = get_field('careers');
$skills = get_field('skills_icons');
$contact = get_field('link_contact');
?>

<section class="about">
    <?php if ($pic && !empty($pic['ID'])) : ?>
        <div class="about__picture-wrap">
            <div class="about__picture">
                <?= wp_get_attachment_image($pic['ID'], 'portrait'); ?>
            </div>
            <div class="about__picture-label">
                <img
                        src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/chiara.png"
                        alt=""
                        aria-hidden="true"
                />
            </div>
            <div class="about__identity">
                <?php if ($job) : ?>
                    <span class="about__identity-role"><?= esc_html($job); ?></span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="about__content">
        <?php if ($title) : ?>
            <h2 class="about__title title">
                <?= esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="about__text">
                <?= wp_kses_post($description); ?>
            </div>
        <?php endif; ?>


    </div>
</section>

<section class="parcours">
    <div class="parcours__title">
        <?php if ($small) : ?><p class="pretitle"><?= esc_html($small); ?></p><?php endif; ?>
        <?php if ($big) : ?><h2 class="title"> <?= esc_html($big); ?></h2><?php endif; ?>
    </div>
    <?php if ($careers) : ?>
        <div class="parcours__timeline">
            <?php foreach ($careers as $career): ?>
                <div class="parcours__cards">
                    <time class="parcours__year">
                        <?= $career['year'] ?>
                    </time>
                    <div class="parcours__body">
                        <span class="parcours__school"><?= $career['school'] ?></span>
                        <span class="parcours__option"> <?= $career['option'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<section class="skills">
    <div class="skills__header">
        <?php if ($small2) : ?>
            <p class="pretitle"><?= esc_html($small2); ?></p>
        <?php endif; ?>
        <?php if ($big2) : ?>
            <h2 class="title"><?= esc_html($big2); ?></h2>
        <?php endif; ?>
    </div>

    <?php if ($skills) : ?>
        <div class="skills__track-wrap">
            <div class="skills__track">
                <?php foreach ($skills as $skill) : ?>
                    <?php if (!empty($skill['id'])) : ?>
                        <div class="skills__item">
                            <?php
                            $mime = get_post_mime_type($skill['id']);
                            if ($mime === 'image/svg+xml') :
                                $url = wp_get_attachment_url($skill['id']);
                                $alt = get_post_meta($skill['id'], '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>" />
                            <?php else : ?>
                                <?= wp_get_attachment_image($skill['id'], 'thumbnail'); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- Duplication pour l'effet infini -->
                <?php foreach ($skills as $skill) : ?>
                    <?php if (!empty($skill['id'])) : ?>
                        <div class="skills__item" aria-hidden="true">
                            <?php
                            $mime = get_post_mime_type($skill['id']);
                            if ($mime === 'image/svg+xml') :
                                $url = wp_get_attachment_url($skill['id']);
                                $alt = get_post_meta($skill['id'], '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>" />
                            <?php else : ?>
                                <?= wp_get_attachment_image($skill['id'], 'thumbnail'); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($contact && !empty($contact['url'])) : ?>
        <a class="skills__link link" href="<?= esc_url($contact['url']); ?>">
            <?= esc_html($contact['title']); ?> <span class="arrow" aria-hidden="true">↗</span>
        </a>
    <?php endif; ?>


</section>

<?php get_footer(); ?>
