<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

?>



<?php

function create_custom_post_type_goals(){
	$labels = array(
		'name' => 'Goals',
		'singular_name' => 'Goal',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Goal',
		'edit_item' => 'Edit Goal',
		'new_item' => 'New Goal',
		'view_item' => 'View Goal',
		'search_items' => 'Search Goals',
		'not_found' => 'No Goal found',
		'not_found_in_trash' => 'No Goals found in Trash',
		'parent_item_colon' => '',
	);

	$args = array(
			'label' => __('Goals'),
			'labels' => $labels, // from array above
			'public' => true,
			'can_export' => true,
			'show_ui' => true,
			'_builtin' => false,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-marker', // from https://www.kevinleary.net/wordpress-dashicons-list-custom-post-type-icons/
			'hierarchical' => false,
			'rewrite' => array( "slug" => "goals" ), // defines URL base
			'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
			'show_in_nav_menus' => true,
			'taxonomies' => array( 'event_category', 'post_tag'), // own categories
			'has_archive' => true
	);


	register_post_type('goals', $args); // used as internal identifier
}

add_action('init','create_custom_post_type_goals'); // define event custom post type

?>