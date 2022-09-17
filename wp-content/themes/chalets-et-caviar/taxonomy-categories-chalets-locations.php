<?php

get_header();


$loop = new WP_Query(array('post_type' => 'chalets', 'taxonomy' => 'categories-chalets', 'term' => 'locations'));
?>
<div class='body-container'>
    <h2 class="session" id="locations">
        Les locations
    </h2>
<div class="sessionProduit">
    <?php

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
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
    ?>
</div>
</div>
<?php

wp_reset_query();

get_footer();
