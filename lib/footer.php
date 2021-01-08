<?php


// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Adds support for after entry widget.
// add_theme_support( 'genesis-after-entry-widget-area' );

///////////////
// PREFOOTER //
///////////////

//* Register the widget area
genesis_register_sidebar( array(
	'id'			=> 'above-footer',
	'name'			=> __( 'Above footer', 'elodin' ),
	'before_title' 	=> '<h2>',
	'after_title'	=>  '</h2>'
) );

//* Display the widget area
add_action( 'genesis_before_footer', 'elodin_add_page_content', 5 );
function elodin_add_page_content() {
	
	//* Bail if we're on the contact page
	if ( is_page( 'contact' ) )
		return;
	
	//* Bail if we're on the quote page
	if ( is_page( 'quote' ) )
		return;

	genesis_widget_area ( 'above-footer', array(
        'before' => '<div class="above-footer"><div class="wrap">',
        'after' => '</div></div>',
	) );
}

////////////////
// FOOTER NAV //
////////////////

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 0 );

// Make the secondary nav only have one level of depth
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}