<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
function add_style(){ /* css links should be in head tag */

		wp_enqueue_style('bootstrap_css_style',get_template_directory_uri() .'/inc/css/bootstrap.min.css');
		wp_enqueue_style('link 0','https://use.fontawesome.com/releases/v5.14.0/css/all.css');
		wp_enqueue_style( 'themeslug-style', get_template_directory_uri() . '/style.css' , array() , '3.1');

}


function custom_scripts(){    /* scripts should be in the end of body tag */
		wp_enqueue_script('bootstrap_js1',get_template_directory_uri() .'/inc/js/jquery-3.1.0.js', array() , false , false);
		wp_enqueue_script('bootstrap_js2',get_template_directory_uri() .'/inc/js/popper.min.js', array() , false , false);
        wp_enqueue_script('bootstrap_js3',get_template_directory_uri() .'/inc/js/bootstrap.min.js', array() , false , false);


}

add_action('wp_enqueue_scripts','custom_scripts');
add_action('wp_enqueue_scripts','add_style');
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function AFFSQUARE_create_custom_menu(){	/*Add menus system to wordpress theme */

		register_nav_menus(array(
		/* menu loctation => menu desc */
		'main-menu' => 'my custom side main menu',	/*menu 1*/
			));
}
add_action('init','AFFSQUARE_create_custom_menu'); /*custom add action for create menu system */
function main_menu(){
	wp_nav_menu(array(
		'theme_location'=>'main-menu',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'bs-example-navbar-collapse-1',
		'menu_class'      => 'navbar-nav mr-auto',
		'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
		'walker'        => new WP_Bootstrap_Navwalker()

		));
}
// Our custom post type function
function team_posttype() {
  
    register_post_type( 'Team member',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
            'show_in_rest' => true,
			'menu_icon'   => 'dashicons-admin-users',
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'team_posttype' );