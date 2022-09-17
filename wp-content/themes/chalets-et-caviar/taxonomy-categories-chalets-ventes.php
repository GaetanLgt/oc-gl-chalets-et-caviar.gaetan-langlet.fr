<?php
get_header();


$loop = new WP_Query(array('post_type' => 'chalets', 'taxonomy' => 'categories-chalets', 'term' => 'ventes'));
?>
<div class='body-container'>
    <h2 class="session" id="locations">
        Les ventes
    </h2>
<div class='sessionProduit'>
    <?php

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
    ?>
</div>
</div>
<?php


wp_reset_query();
get_footer();
