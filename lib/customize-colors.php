<?php

add_action( 'customize_register', 'urban_color_controls_customizer' );
function urban_color_controls_customizer( $wp_customize ) {

	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'description' => __( 'The site primary color', 'brindle-urban' ),
				'label'       => __( 'Primary Color', 'brindle-urban' ),
				'section'     => 'colors',
				'settings'    => 'primary_color',
			)
		)
	);
	
	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'description' => __( 'The site secondary color', 'brindle-urban' ),
				'label'       => __( 'Secondary Color', 'brindle-urban' ),
				'section'     => 'colors',
				'settings'    => 'secondary_color',
			)
		)
	);

}

add_action( 'admin_head', 'urban_output_color_vars');
add_action( 'wp_head', 'urban_output_color_vars');
function urban_output_color_vars() {
	
	$primary_color 		= get_theme_mod( 'primary_color' );
	$secondary_color 	= get_theme_mod( 'secondary_color' );
	
	echo '<style>';
		printf( 
			'
				:root {
					--primary: %s;
					--secondary: %s;
				}
			',
			$primary_color,
			$secondary_color
		);
	echo '</style>';
}