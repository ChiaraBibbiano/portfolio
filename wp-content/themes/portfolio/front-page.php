<?php
$title = get_field('title');
$author = get_field('author');
$about = get_field('about_link');
$project = get_field('link_projects');
$small = get_field('small_title');
$big = get_field('big_title');
$job = get_field('job');
?>

<?php get_header(); ?>

<main id="contenu">
    <section class="hero">
        <div class="hero-background"> <!--boucle pour mon titre -->
            <?php for ($i = 0; $i < 7; $i++) : ?>
                <p><?= esc_html($title); ?></p>
            <?php endfor; ?>
        </div>
<!--        <div>
            <svg></svg>
        </div>-->
        <div class="hero-content">
            <div class="hero-left">
                <p><?= get_field('job');?></p>
            </div>

            <div class="hero-right">
                <h1><?= get_field('author');?></h1>
                <!--<a href="./template-about.php"><?php /*= get_field('about_link');*/?> ↗</a>-->
            </div>



        </div>
<!--        <div class="hero-content">
            <div class="hero-left">
                <p><?php /*= esc_html($job); */?></p>
            </div>

            <div class="hero-right">
                <h1><?php /*= esc_html($author); */?></h1>

                <?php /*if ($about): */?>
                    <a href="<?php /*= esc_url($about); */?>">
                        Me découvrir <span>↗</span>
                    </a>
                <?php /*endif; */?>
            </div>
        </div>-->
    </section>
    <section>
        <!-- PROJECTS -->
        <section class="projects">
            <div class="projects-header">
                <p><?= get_field('small_title') ?></p>
                <h2> <?= get_field('big_title') ?></h2>
            </div>

            <div class="projects-grid">

<!--                <article class="project">
                    <h3>SITE CV</h3>
                    <div class="project-card"></div>
                </article>

                <article class="project project-large">
                    <h3>SOUNDLABS</h3>
                    <div class="project-card"></div>
                </article>

                <article class="project">
                    <h3>PLAI</h3>
                    <div class="project-card"></div>
                </article>-->

            </div>

            <div class="projects-footer">
                <a href="<?= get_field('link_projects') ?>">Découvrir toutes mes créations <span>↗</span></a>
            </div>

        </section>
    </section>
</main>




<?php get_footer(); ?>