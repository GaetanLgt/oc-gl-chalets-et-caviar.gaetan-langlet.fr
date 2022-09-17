<?php
/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_parent_script' );
function hello_elementor_child_enqueue_parent_script() {
	// Load the stylesheet.
	wp_enqueue_style( 'hello-elementor-style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script( 'wp_enqueue_scripts', get_stylesheet_directory_uri() . '/src/js/script.js' );
	
}

add_filter('acf/format_value/name=cout_hebdomadaire', 'fix_number');
add_filter('acf/format_value/name=prix_de_vente', 'fix_number');
function fix_number($value) {
  $value = number_format($value ,0,',',' ');
  return $value;
}

/*
* On utilise une fonction pour créer notre custom post type 'Chalet'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Chalets', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Chalet', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Chalets'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les chalets'),
		'view_item'           => __( 'Voir les chalets'),
		'add_new_item'        => __( 'Ajouter un nouveau chalet'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le chalet'),
		'update_item'         => __( 'Modifier le chalet'),
		'search_items'        => __( 'Rechercher un chalet'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Chalets'),
		'description'         => __( 'Tous sur les chalets'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-home',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		// 'rewrite'			  => array( 'slug' => 'chalet'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'chalets', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	
	// Catégorie du chalet

	$labels_cat_chalets = array(
		'name'                       => _x( 'Catégories du chalet', 'taxonomy general name'),
		'singular_name'              => _x( 'Catégories du chalet', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une catégorie'),
		'popular_items'              => __( 'Catégories populaires'),
		'all_items'                  => __( 'Toutes les catégories'),
		'edit_item'                  => __( 'Editer une catégorie'),
		'update_item'                => __( 'Mettre à jour une catégorie'),
		'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
		'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
		'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
		'not_found'                  => __( 'Pas de catégories trouvées'),
		'menu_name'                  => __( 'Catégories de chalet'),
	);

	$args_cat_chalets = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_cat_chalets,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'categories-chalets' ),
	);

	register_taxonomy( 'categories-chalets', 'chalets', $args_cat_chalets );
}

function display_coordonnees(){
	$poney = "<div id='coordonnees'><h2>Coordoonées</h2><h3><span id='nom_de_la_societe'>". get_field('nom_de_la_societe')."</span></h3><p><span id='numero'>". get_field('numero')."</span> <span id='nom_de_la_rue'>". get_field('nom_de_la_rue')."</span></p><p> <span id='code_postal'>". get_field('code_postal')."</span><span id='ville'> ". get_field('ville')."</span><p id='telephone'>Tel : ". get_field('telephone')."</p></p id='telephone'>E-mail : ". get_field('e-mail')."<p>";
	return $poney;
}

add_shortcode('coordonnees', 'display_coordonnees');