<?php
/*
 * Template Name: Project
 */

get_header();

$small = get_field('small_title');
$big = get_field('big_title');

// Paramètre filtre dans l'URL
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Arguments WP_Query
$args = [
        'post_type' => 'project',
        'posts_per_page' => 6,
        'paged' => $paged,
        'no_found_rows' => false,
];

if ($taxonomy !== '') {
    $args['tax_query'] = [
            [
                    'taxonomy' => 'type',
                    'field' => 'slug',
                    'terms' => $taxonomy,
            ],
    ];
}

$projects = new WP_Query($args);
$page_url = get_permalink();
?>

    <section class="projects">

        <div class="projects__header">
            <?php if ($small) : ?>
                <p class="pretitle"><?= esc_html($small); ?></p>
            <?php endif; ?>
            <?php if ($big) : ?>
                <h2 class="title"><?= esc_html($big); ?></h2>
            <?php endif; ?>
        </div>

        <!-- FILTRES -->
        <nav class="projects__filters" aria-label="<?= esc_attr(__hepl('Filtrer les projets')); ?>">
            <ul>
                <li class="projects__filtre <?= ($taxonomy === '') ? 'projects__filtre--active' : ''; ?>">
                    <a href="<?= esc_url($page_url); ?>"><?= __hepl('Tout'); ?></a>
                </li>
                <li class="projects__filtre <?= ($taxonomy === 'web') ? 'projects__filtre--active' : ''; ?>">
                    <a href="<?= esc_url(add_query_arg('filter', 'web', $page_url)); ?>">Web</a>
                </li>
                <li class="projects__filtre <?= ($taxonomy === 'mobile') ? 'projects__filtre--active' : ''; ?>">
                    <a href="<?= esc_url(add_query_arg('filter', 'mobile', $page_url)); ?>">Mobile</a>
                </li>
                <li class="projects__filtre <?= ($taxonomy === '3D') ? 'projects__filtre--active' : ''; ?>">
                    <a href="<?= esc_url(add_query_arg('filter', '3D', $page_url)); ?>">3D</a>
                </li>
            </ul>
        </nav>

        <!-- GRILLE CPT -->
        <?php if ($projects->have_posts()) : ?>
            <div class="projects__grid2">
                <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                    <article class="projects__card2">
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

        <?php else : ?>
            <p class="empty"><?= __hepl('Aucun projet trouvé.'); ?></p>
        <?php endif; ?>

        <!-- PAGINATION -->
        <?php if ($projects->max_num_pages > 1) : ?>
            <nav class="pagination" aria-label="<?= esc_attr(__hepl('Navigation entre les pages')); ?>">
                <div class="pagination__prev" title="<?= esc_attr( __hepl('Vers la page précédente') ); ?>">
                    <?= get_previous_posts_link(
                            '<span class="link">' . __hepl('Précédent') . ' <span class="arrow" aria-hidden="true">↙</span></span>',
                            $projects->max_num_pages
                    ); ?>
                </div>
                <div class="pagination__next" title="<?= esc_attr( __hepl('Vers la page suivante') ); ?>">
                    <?= get_next_posts_link(
                            '<span class="link">' . __hepl('Suivant') . ' <span class="arrow" aria-hidden="true">↗</span></span>',
                            $projects->max_num_pages
                    ); ?>
                </div>
            </nav>
        <?php endif; ?>

    </section>

<?php get_footer(); ?>