<?php

/**
 * Template Name: Home Page
 */

get_header();
get_the_content();
?>
<?php

?>


<div class="sessionProduit">
	<?php

	if (have_posts()) :
	
	
	while (have_posts()) : the_post();
	
	// get all of the terms for this post, with the taxonomy of categories-projets.
	$terms = get_the_terms(get_the_ID(), 'categories-chalets');
	

	// create the span element, and write out the date this post was created.

	foreach ($terms as $term) {
	
		$slug = $term->slug;
		
	if ($slug == 'locations') {
	?>
	<div class="card">
		<img src="<?php the_field('visuel'); ?>" alt="image de chalet">
		<div class="infos">
			<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<p class="spec"><?php the_field('nombre_de_personnes_min'); ?> à <?php the_field('nombre_de_personnes_max'); ?>
				personnes</p>
			<p class="price"><?php the_field('cout_hebdomadaire'); ?> €/semaine</p>
			<p><?php the_field('description'); ?></p>
		</div>
		<div class="callToAction"><a href="/contact"> Pour réserver : contacter-nous !</a></div>
	</div>
	<?php
				} else {
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
			<div class="callToAction"><a href="/contact"> Pour réserver : contacter-nous !</a></div>
		</div>
	</div>
	<?php
				}
			}


		endwhile;
		?>
</div>
<?php
		wp_reset_query();

	endif;
?>


<?php get_footer(); ?>