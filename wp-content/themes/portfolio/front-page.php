<?php
$title = get_field('title');
$author = get_field('author');
$about = get_field('about_link');
$project = get_field('link_projects');
$small = get_field('small_title');
$big = get_field('big_title');
$job = get_field('job');
$description = get_field('description', get_the_ID());

// Je viens définir mon tableau d'arguments pour constituer ma QUERY
$args = [
        'post_type' => 'project',
        'posts_per_page' => 3
];

$projects = new WP_Query($args);

get_header(); ?>

    <section class="hero">
        <?php if ($title) : ?>
            <div class="hero__background">
                <?php for ($i = 0; $i < 7; $i++) : ?>
                    <p><?= esc_html($title); ?></p>
                <?php endfor; ?>
                <img class="hero__background-img"
                     src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/portfolio-3d.png"
                     alt="images 3D Portfolio"
                />
            </div>
        <?php endif; ?>
            <div class="hero__intro">
                <?php if ($job) : ?>
                    <p class="hero__role"><?= esc_html($job) ?></p>
                <?php endif; ?>

                <div class="hero__intro-right">
                    <?php if ($author) : ?>
                        <p class="hero__name"><?= esc_html($author) ?></p>
                    <?php endif; ?>
                    <?php if ($about) : ?>
                        <a class="hero__discover link" href="<?= esc_url($about['url']) ?>">
                            <?= esc_html($about['title']) ?> <span class="arrow">↗</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
    </section>

    <!-- PROJECTS -->
    <section class="projects">
        <div class="projects__header">
            <?php if ($small) : ?><p class="pretitle"><?= esc_html($small) ?></p><?php endif; ?>
            <?php if ($big) : ?><h2 class="title"><?= esc_html($big) ?></h2><?php endif; ?>
        </div>

        <?php if ($projects->have_posts()) : ?>
            <div class="projects__grid">
                <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                    <article class="projects__card">
                        <div class="project-card__info">
                        <span class="project-card__label">
                            <?= esc_html(get_the_title()); ?>
                        </span>
                        </div>
                        <a class="project-card__link link" href="<?= esc_url(get_the_permalink()); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-card__thumb">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
        <?php if ($project && !empty($project['url'])) : ?>
            <div class="projects__footer">
                <a class="projects__link link" href="<?= esc_url($project['url']) ?>">
                    <?= esc_html($project['title']) ?> <span class="arrow">↗</span>
                </a>
            </div>
        <?php endif; ?>

    </section>
<?php get_footer(); ?>