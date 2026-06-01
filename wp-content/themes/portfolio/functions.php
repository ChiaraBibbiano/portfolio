<?php


include('core/theme/configuration.php');

register_nav_menu('header', 'Le menu qui se trouve dans le header');
register_nav_menu('footer', 'Le menu qui se trouve dans le footer');
register_nav_menu('social-media', 'Le menu qui regroupe nos réseaux sociaux');

function dw_get_navigation_links(string $menu_name): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $all_menus = get_nav_menu_locations();

    if (!isset($all_menus[$menu_name])) {
        return [];
    }

    // Je récupère l'id de mon menu
    $nav_id = $all_menus[$menu_name];

    $items_menu = wp_get_nav_menu_items($nav_id);
    $links = [];

    foreach ($items_menu as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;
        $link->title = $item->attr_title;

        $links[] = $link;
    }

    return $links;
}

dw_get_navigation_links('header');

function dw_asset(string $filename): string
{
    $manifest_path = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['wp-content/themes/portfolio/assets/css/styles.scss']) && $filename === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/css/styles.scss']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/assets/js/main.js']) && $filename === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/js/main.js']['file']);
        }
    }

    return '';
}

//charger les traductions existantes
load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');

// Fonction pour les chaînes de traduction personnalisées
function __hepl(string $translation): ?string
{
    return __($translation, 'hepl-trad');
}

add_theme_support('post-thumbnails');


register_post_type('project', [
    'label' => 'Mes projets',
    'description' => 'Mes projets perso',
    'menu_position' => 2,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'public' => true,
    'has_archive' => false,
    'supports' => ['title', 'thumbnail'],
    'rewrite' => [
        'slug' => 'mes-créations'
    ],
]);

register_taxonomy('type', 'project', [
    'hierarchical' => true,
    'labels' => [
        'name' => 'Le type de projet'
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
]);

//taille image photo de moi
add_image_size( 'portrait', 370, 400, true );


//autorisé svg sur wp
function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );


/*// Activer la traduction pour le CPT project
add_filter('pll_get_post_types', function($post_types) {
    $post_types['project'] = 'project';
    return $post_types;
});

// Activer la traduction pour la taxonomie type
add_filter('pll_get_taxonomies', function($taxonomies) {
    $taxonomies['type'] = 'type';
    return $taxonomies;
});*/






