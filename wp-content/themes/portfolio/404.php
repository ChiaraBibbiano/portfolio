<?php get_header(); ?>

    <section class="error-404">
        <div class="error-404__content">

            <p class="error-404__code pretitle">404</p>

            <h2 class="error-404__title title">
                <?= __hepl('Page non trouvée'); ?>
            </h2>

            <p class="error-404__text">
                <?= __hepl('Désolé, la page que vous recherchez n\'existe pas ou a été déplacée.'); ?>
            </p>

            <a class="error-404__link link"
               href="<?= esc_url(home_url('/')); ?>"
               title="<?= esc_attr(__hepl('Vers la page d\'accueil')); ?>">
                <?= __hepl('Retour à la page d\'accueil'); ?>
                <span aria-hidden="true">↗</span>
            </a>

        </div>
    </section>

<?php get_footer(); ?>