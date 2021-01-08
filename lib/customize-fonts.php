<?php

//* Add font controls to the customizer
add_action( 'customize_register', 'urban_controls_fonts' );
function urban_controls_fonts( $wp_customize ) {
    
    $wp_customize->add_section(
		'fonts',
		array(
			'priority' => 50,
			'title' => __( 'Fonts' ),
			'description' => __( '' ),
			'panel' => '',
		)
	);
	$wp_customize->add_setting( 'urban_font_selection', array(
		'capability' => 'edit_theme_options',
		'default' => 'pairing1',
		'sanitize_callback' => 'urban_sanitize_font_selection',
    ) );
    
	$wp_customize->add_control( 'urban_font_selection', array(
		'type' => 'radio',
		'section' => 'fonts',
		'label' => __( 'Font pairing' ),
		'description' => __( 'Select the font pairing for use on the site.' ),
		'choices' => array(
			'pairing1' => __( 'Montserrat & Work Sans' ),
			'none' => __( 'No selection (arial throughout)' ),
		),
	) );

}

//* Sanitize the selection
function urban_sanitize_font_selection( $input, $setting ) {
    
	// Ensure input is a slug
	$input = sanitize_key( $input );
	
	// Get a list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//* Enqueue the fonts for Gutenberg
add_action( 'after_setup_theme', 'urban_register_fonts_gutenberg' );
function urban_register_fonts_gutenberg() {
    
    $urban_font_selection = get_theme_mod( 'urban_font_selection' );
    
    if ( $urban_font_selection == 'pairing1' ) {
        add_editor_style( '//fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;1,300;1,400' );
        add_editor_style( '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,800;1,400;1,800' );
        add_editor_style( "/css/fontpairings/pairing1.css" );
    }
}

//* Enqueue the fonts on the frontend
add_action( 'wp_enqueue_scripts', 'urban_enqueue_fonts_frontend', 99 );
function urban_enqueue_fonts_frontend() {
    
    $urban_font_selection = get_theme_mod( 'urban_font_selection' );
    
    if ( $urban_font_selection == 'pairing1' ) {
        wp_enqueue_style( 'work-sans',
            '//fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;1,300;1,400',
            array(),
            CHILD_THEME_VERSION
        );
        
        wp_enqueue_style( 'montserrat',
            '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,800;1,400;1,800',
            array(),
            CHILD_THEME_VERSION
        );
        
        // Add the main stylesheet
        wp_enqueue_style( 'pairing1',
            get_stylesheet_directory_uri() . "/css/fontpairings/pairing1.css",
            array(),
            CHILD_THEME_VERSION
        );
    }
}