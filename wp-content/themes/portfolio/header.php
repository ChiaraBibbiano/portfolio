<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= esc_html(get_the_title()); ?>Le portfolio de Chiara BIBBIANO</title>
    <link rel="stylesheet" type="text/css" href="<?= esc_url(dw_asset('css')); ?>">
    <script src="<?= esc_url(dw_asset('js')); ?>" defer></script>
    <link rel="stylesheet" href="https://use.typekit.net/xro0woe.css">
</head>
<body>
<h1 class="sro"><?= esc_html(get_the_title()); ?></h1>
<header>
    <nav class="navigation">
        <h2 class="navigation__title sro">Menu de navigation</h2>

        <div class="navigation__logo">
            <a class="navigation__logo-name" href="<?= esc_url(home_url('/')); ?>">
                BIBBIANO<br>CHIARA
            </a>
        </div>

        <button class="navigation__burger" aria-label="Ouvrir le menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="navigation__list">
            <?php foreach (dw_get_navigation_links('header') as $link) :
                $is_active = rtrim($link->href, '/') === rtrim(get_permalink(), '/');
                ?>
                <li class="navigation__list-item">
                    <a class="navigation__link <?= $is_active ? 'navigation__link--active' : ''; ?>"
                       href="<?= esc_url($link->href); ?>"
                            <?= $is_active ? 'aria-current="page"' : ''; ?>>
                        <?= esc_html($link->label); ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <?php foreach (pll_the_languages(['raw' => true]) as $lang) : ?>
                <li class="navigation__list-item-language <?= $lang['current_lang'] ? 'navigation__list-item-language--active' : ''; ?>">
                    <a class="navigation__link-language"
                       lang="<?= esc_attr($lang['locale']); ?>"
                       hreflang="<?= esc_attr($lang['locale']); ?>"
                       href="<?= esc_url($lang['url']); ?>">
                        <?= esc_html(strtoupper($lang['slug'])); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <nav class="nav-mobile" id="nav-mobile">
        <ul class="nav-mobile__list">
            <?php foreach (dw_get_navigation_links('header') as $link) : ?>
                <li>
                    <a class="nav-mobile__link"
                       href="<?= esc_url($link->href); ?>"
                            <?= rtrim($link->href, '/') === rtrim(get_permalink(), '/') ? 'aria-current="page"' : ''; ?>>
                        <?= esc_html($link->label); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main id="contenu">