<?php
$footer = dw_get_navigation_links('footer');
$social = dw_get_navigation_links('social-media');
?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__infos">
                <h2 class="footer__title">Coordonnées</h2>

                <address class="footer__address">
                    <?php if (!empty($phone_number)): ?>
                        <a class="footer__link footer__link--contact" href="<?= $phone_number['url']; ?>">
                            <?= $phone_number['title']; ?>
                        </a>
                    <?php else: ?>
                        <a class="footer__text" href="tel:+32472382403">+32 4XX XX XX XX</a>
                    <?php endif; ?>

                    <?php if (!empty($contact_mail)): ?>
                        <a class="footer__link footer__link--contact" href="mailto:<?= get_field($contact_mail); ?>">
                            <?= get_field($contact_mail); ?>
                        </a>
                    <?php else: ?>
                        <a class="footer__text" href="chiara.bibbiano@student.hepl.be">chiara.bibbiano@student.hepl.be</a>
                    <?php endif; ?>

                    <p class="footer__text">Belgique,</p>
                    <p class="footer__text">Liège</p>
                </address>
            </div>
            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h2 class="footer__title" id="footer-nav-title">Navigation</h2>
                <ul class="footer__list" role="list">
                    <?php foreach ($footer as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="footer__infos">
                <h2 class="footer__title">Suivez-moi</h2>
                <address class="footer__address">
                    <ul class="footer__list" role="list">
                        <?php foreach ($social as $link) : ?>
                            <li class="footer__item">
                                <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </address>
            </div>
        </div>
        <div class="footer__bottom">
            <p class="footer__copyright">
                <strong>©2026</strong>BIBBIANO CHIARA. Tous droits réservés. Créé par BIBBIANO CHIARA
            </p>
            <ul class="footer__legal" role="list">
                <li class="footer__legal-item">
                    <a class="footer__legal-link" href="#">Mentions légales</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>