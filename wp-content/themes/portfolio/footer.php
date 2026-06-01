<?php
$footer = dw_get_navigation_links('footer');
$social = dw_get_navigation_links('social-media');
?>
</main>
<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">

            <div class="footer__infos">
                <h2 class="footer__title"><?= __hepl('Coordonnées'); ?></h2>
                <address class="footer__address">
                    <a class="footer__text" href="tel:+32472382403">+32 4XX XX XX XX</a>
                    <a class="footer__text" href="mailto:chiara.bibbiano@student.hepl.be">
                        chiara.bibbiano@student.hepl.be
                    </a>
                    <p class="footer__text"><?= __hepl('Belgique'); ?></p>
                </address>
            </div>

            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h2 class="footer__title" id="footer-nav-title"><?= __hepl('Navigation'); ?></h2>
                <ul class="footer__list" role="list">
                    <?php foreach ($footer as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= esc_url($link->href); ?>">
                                <?= esc_html($link->label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="footer__infos">
                <h2 class="footer__title"><?= __hepl('Suivez-moi'); ?></h2>
                <ul class="footer__list" role="list">
                    <?php foreach ($social as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link"
                               href="<?= esc_url($link->href); ?>"
                               target="_blank"
                               rel="noopener noreferrer">
                                <?= esc_html($link->label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

        <div class="footer__bottom">
            <p class="footer__copyright">
                © <?= date('Y'); ?> BIBBIANO CHIARA. <?= __hepl('Tous droits réservés.'); ?>
            </p>
            <ul class="footer__legal" role="list">
                <li class="footer__legal-item">
                    <a class="footer__legal-link" href="<?= esc_url(home_url('/mentions-legales')); ?>">
                        <?= __hepl('Mentions légales'); ?>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</footer>
</body>
</html>