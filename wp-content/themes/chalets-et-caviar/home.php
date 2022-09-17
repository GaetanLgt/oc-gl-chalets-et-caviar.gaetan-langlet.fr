<?php

/**
 * Template Name: Home Page
 */

get_header();
the_content();
?>
<?php
$posts = new WP_Query(array('post_type' => 'chalets', 'taxonomy' => 'categories-chalets', 'categories-chalets' => 'locations', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => 5));
?>
<div class='body-container'>
    <h2 class="session" id="locations">
        Les locations
    </h2>
    <div class="sessionProduit">
        <?php
        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
        ?>
                <div class="card">
                    <img src="<?php the_field('visuel'); ?>" alt="image de chalet">
                    <div class="infos">
                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        <p class="spec"><?php the_field('nombre_de_personnes_min'); ?> à <?php the_field('nombre_de_personnes_max'); ?> personnes</p>
                        <p class="price"><?php the_field('cout_hebdomadaire'); ?> €/semaine</p>
                        <p><?php the_field('description'); ?></p>
                    </div>
                </div>
        <?php

            }
        }
        echo "</div>";
        ?>
        <h2 class="session" id="ventes">
            Les ventes
        </h2>
        <?php
        echo "<div class='sessionProduit'>";
        $loop = new WP_Query(array('post_type' => 'chalets', 'taxonomy' => 'categories-chalets', 'categories-chalets' => 'ventes', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => 5));
        if ($loop->have_posts()) {
            while ($loop->have_posts()) {
                $loop->the_post();
        ?>
                <div class="card">
                    <img src="<?php the_field('visuel'); ?>" alt="image de chalet">
                    <div class="infos">
                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        <p class="spec"><?php the_field('surface'); ?> m²</p>
                        <p class="price"><?php the_field('prix_de_vente'); ?> €</p>
                        <p><?php the_field('description'); ?></p>
                        <?php if (get_field('plus')) : ?>
                            <div class="plus">
                                <h4> Le + :</h4>
                                <p><?php the_field('plus'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
        <?php
            }
        }
        echo "</div>";
        echo "<div class='callToAction'><a href='/contact'> Pour réserver : contacter-nous !</a></div>";


        get_footer();
