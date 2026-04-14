<?php
// On récupère le paramètre filter dans l'URL, si il est présent
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

// Je viens définir mon tableau d'arguments pour constituer ma QUERY
$args = [
        'post_type' => 'project',
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

<?php get_header(); ?>

<div>
    <a href="/projets/">
        Tout
    </a>

    <a href="/projets/?filter=web">
        Web
    </a>

    <a href="/projets/?filter=mobile">
        Mobile
    </a>

    <a href="/projets/?filter=2D">
        2D
    </a>

    <a href="/projets/?filter=3D">
        3D
    </a>
</div>

<?php if ($projects->have_posts()) : while ($projects->have_posts()): $projects->the_post(); ?>
    <div>
        <?= get_the_title(); ?>
        <a href="<?= get_the_permalink() ?>">
            <?= get_the_post_thumbnail(); ?>
        </a>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
