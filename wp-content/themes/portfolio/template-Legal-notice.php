<?php
/*
 * Template Name: Legal notice
 */

get_header();

$small = get_field('small_title');
$big   = get_field('big_title');
$leg   = get_field('legal_notice');
?>

    <section class="legal">

        <div class="legal__header">
            <?php if ( $small ) : ?>
                <p class="legal__small pretitle"><?= esc_html( $small ); ?></p>
            <?php endif; ?>
            <?php if ( $big ) : ?>
                <h1 class="legal__title title"><?= esc_html( $big ); ?></h1>
            <?php endif; ?>
        </div>

        <?php if ( $leg ) : ?>
            <div class="legal__body">
                <?= wp_kses_post( $leg ); ?>
            </div>
        <?php endif; ?>

    </section>

<?php get_footer(); ?>