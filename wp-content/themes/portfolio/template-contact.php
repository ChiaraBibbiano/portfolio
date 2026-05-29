<?php
/*
 * Template Name: Contact
 */

get_header();

$small = get_field('small_title');
$big = get_field('big_title');
$phone_number = get_field('phone_number');
$contact_mail = get_field('contact_mail');
?>

    <section class="contact">
        <div class="contact__header">
            <?php if ($small) : ?>
                <p class="contact__small pretitle"><?= esc_html($small); ?></p>
            <?php endif; ?>
            <?php if ($big) : ?>
                <h2 class="contact__title title" ><?= esc_html($big); ?></h2>
            <?php endif; ?>
        </div>
        <div class="contact__body">
            <div class="contact__coords">
                <h2 class="contact__coords-title">MES COORDONNÉES</h2>
                <address class="contact__address">
                    <?php if (!empty($phone_number['url'])) : ?>
                        <a class="contact__coords-link" href="<?= esc_url($phone_number['url']); ?>">
                            <?= esc_html($phone_number['title']); ?>
                        </a>
                    <?php else : ?>
                        <a class="contact__coords-link" href="tel:+32472382403">
                            +32 4XX XX XX XX
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($contact_mail)) : ?>
                        <a class="contact__coords-link" href="mailto:<?= esc_attr($contact_mail); ?>">
                            <?= esc_html($contact_mail); ?>
                        </a>
                    <?php else : ?>
                        <a class="contact__coords-link" href="mailto:chiarabibbiano@gmail.com">
                            chiarabibbiano@gmail.com
                        </a>
                    <?php endif; ?>

                    <span class="contact__coords-text">Belgique</span>

                </address>
            </div>

            <!--  FORMULAIRE CF7 -->
            <div class="contact__form-wrap">
                <?= do_shortcode('[contact-form-7 id="cf9f391" title="Formulaire de contact 1"]'); ?>
            </div>

        </div>

    </section>

<?php get_footer(); ?>