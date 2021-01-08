<?php


// add_action( 'customize_register', 'urban_brindle' );
// function urban_brindle( $wp_customize ) {
 
// 	$wp_customize->add_section( 'textcolors' , 
// 		array( 'title' =>  'Color Scheme', 
// 	) );
	
// 	// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
// 	$txtcolors[] = array(
// 		'slug'=>'color_scheme_1', 
// 		'default' => '#000',
// 		'label' => 'Main Color'
// 	);
	
// 	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
// 	$txtcolors[] = array(
// 		'slug'=>'color_scheme_2', 
// 		'default' => '#666',
// 		'label' => 'Secondary Color'
// 	);
	
// 	// link color
// 	$txtcolors[] = array(
// 		'slug'=>'link_color', 
// 		'default' => '#008AB7',
// 		'label' => 'Link Color'
// 	);
	
// 	// link color ( hover, active )
// 	$txtcolors[] = array(
// 		'slug'=>'hover_link_color', 
// 		'default' => '#9e4059',
// 		'label' => 'Link Color (on hover)'
// 	);
	
// 	// add the settings and controls for each color
// 	foreach( $txtcolors as $txtcolor ) {
	
// 		// SETTINGS
// 		$wp_customize->add_setting(
// 			$txtcolor['slug'], array(
// 				'default' => $txtcolor['default'],
// 				'type' => 'option', 
// 				'capability' =>  'edit_theme_options'
// 			)
// 		);
		
// 	}
// }

/**
 * Set the theme colors
 */
add_action( 'after_setup_theme', 'elodin_register_colors' );
function elodin_register_colors() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'White', 'elodin_twentynineteen' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Light', 'elodin_twentynineteen' ),
				'slug' => 'light',
				'color' => '#f5f5f5',
            ),
            array(
				'name'  => esc_html__( 'Default', 'elodin_twentynineteen' ),
				'slug' => 'default',
				'color' => '#666',
            ),
            array(
				'name'  => esc_html__( 'Dark', 'elodin_twentynineteen' ),
				'slug' => 'dark',
				'color' => '#333',
			),
			array(
				'name'  => esc_html__( 'Highlight', 'elodin_twentynineteen' ),
				'slug' => 'highlight',
				'color' => '#147bcd',
            ),
		)
	);
}