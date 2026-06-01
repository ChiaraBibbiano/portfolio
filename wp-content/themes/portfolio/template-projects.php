<?php
/*
 * Template Name: Project
 */


$small = get_field('small_title');
$big = get_field('big_title');


get_header(); ?>

<section class="projects">
    <div class="parcours__title">
        <?php if ($small) : ?><p class="pretitle"><?= esc_html($small); ?></p><?php endif; ?>
        <?php if ($big) : ?><h2 class="title"> <?= esc_html($big); ?></h2><?php endif; ?>
    </div>


    <?php
    // On récupère le paramètre filter dans l'URL, si il est présent
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Je viens définir mon tableau d'arguments pour constituer ma QUERY
    $args = [
            'post_type' => 'project',
            'posts_per_page' => 6,
            'paged' => $paged
    ];

    // Si la taxonomy n'est pas vide, je vais venir effectuer une requête en DB via tax_query pour filtrer en fonction de mon filter
    if ($taxonomy !== '') {
        $args['tax_query'] = [
                [
                        'taxonomy' => 'type',
                        'field' => 'slug',
                        'terms' => $taxonomy,
                ]

        ];
    }

    $projects = new WP_Query($args);
    ?>

    <!--FILTRE-->
    <nav class="projects__filters" aria-label="Filtrer les projets">
        <ul>
            <li class="projects__filtre <?= ($taxonomy === '') ? 'projects__filtre--active' : ''; ?>">
                <a href="<?= esc_url(get_permalink()); ?>">Tout</a>
            </li>
            <li class="projects__filtre <?= ($taxonomy === 'web') ? 'projects__filtre--active' : ''; ?>">
                <a href="<?= esc_url(add_query_arg('filter', 'web', get_permalink())); ?>">Web</a>
            </li>
            <li class="projects__filtre <?= ($taxonomy === 'mobile') ? 'projects__filtre--active' : ''; ?>">
                <a href="<?= esc_url(add_query_arg('filter', 'mobile', get_permalink())); ?>">Mobile</a>
            </li>
            <li class="projects__filtre <?= ($taxonomy === '3D') ? 'projects__filtre--active' : ''; ?>">
                <a href="<?= esc_url(add_query_arg('filter', '3D', get_permalink())); ?>">3D</a>
            </li>
        </ul>
    </nav>

    <!--GRILLE CPT-->
    <?php if ($projects->have_posts()) : ?>
    <div class="projects__grid2">
        <?php while ($projects->have_posts()): $projects->the_post(); ?>
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
        <?php endwhile; else: ?>
            <p class="empty"><?php _e('Aucun projet trouvé.'); ?></p>
        <?php endif; ?>
    </div>


    <!--PAGINATION-->
    <?php if ($projects->max_num_pages > 1) : ?>
        <nav class="pagination " aria-label="Navigation entre les pages">
            <div class="pagination__prev"
                 title="<?= __hepl('Vers la page précédente') ?>"><?= get_previous_posts_link(__hepl('<span class="link">Précédent</span>'), $projects->max_num_pages); ?>
            </div>
            <div class="pagination__next "
                 title="<?= __hepl('Vers la page suivante') ?>"><?= get_next_posts_link(__hepl('<span class="link">Suivant</span>'), $projects->max_num_pages); ?>
            </div>
        </nav>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
