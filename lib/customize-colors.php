<?php

//* Add color controls to the customizer
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
				'description' => __( 'The site primary color', 'brindle_urban' ),
				'label'       => __( 'Primary Color', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'primary_color',
			)
		)
	);
	
	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'           => '#333331',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'description' => __( 'The site secondary color', 'brindle_urban' ),
				'label'       => __( 'Secondary Color', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'secondary_color',
			)
		)
	);
	
	$wp_customize->add_setting(
		'light',
		array(
			'default'           => '#f7f7f7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'light',
			array(
				'description' => __( 'A light color to allow clean section transitions', 'brindle_urban' ),
				'label'       => __( 'Light', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'light',
			)
		)
	);
	
	$wp_customize->add_setting(
		'default_text',
		array(
			'default'           => '#666666',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_text',
			array(
				'description' => __( 'The default text color', 'brindle_urban' ),
				'label'       => __( 'Text Color', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'default_text',
			)
		)
	);
	
	$wp_customize->add_setting(
		'default_button_link',
		array(
			'default'           => '#333330',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_button_link',
			array(
				'description' => __( 'The default color for links and for button backgrounds', 'brindle_urban' ),
				'label'       => __( 'Buttons & Links', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'default_button_link',
			)
		)
	);
	
	$wp_customize->add_setting(
		'bonus_color_1',
		array(
			'default'           => '#333334',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bonus_color_1',
			array(
				'description' => __( 'A bonus color. This will be enabled in the Gutenberg editor but will not automatically change any theme colors.', 'brindle_urban' ),
				'label'       => __( 'Bonus color 1', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'bonus_color_1',
			)
		)
	);
	
	$wp_customize->add_setting(
		'bonus_color_2',
		array(
			'default'           => '#333335',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bonus_color_2',
			array(
				'description' => __( 'Another bonus color. This will be enabled in the Gutenberg editor but will not automatically change any theme colors.', 'brindle_urban' ),
				'label'       => __( 'Bonus color 2', 'brindle_urban' ),
				'section'     => 'colors',
				'settings'    => 'bonus_color_2',
			)
		)
	);

}

//* Output the styles for the colors
add_action( 'admin_head', 'urban_output_color_vars');
add_action( 'wp_head', 'urban_output_color_vars');
function urban_output_color_vars() {

	$colors = array(
		array(
			'label' => 'white',
			'hex' => '#ffffff',
		),
		array(
			'label' => 'primary',
			'hex' => get_theme_mod( 'primary_color' ),
		),
		array(
			'label' => 'secondary',
			'hex' => get_theme_mod( 'secondary_color' ),
		),
		array(
			'label' => 'light',
			'hex' => get_theme_mod( 'light' ),
		),
		array(
			'label' => 'default',
			'hex' => get_theme_mod( 'default_text' ),
		),
		array(
			'label' => 'link',
			'hex' => get_theme_mod( 'default_button_link' ),
		),
		array(
			'label' => 'bonus_color_1',
			'hex' => get_theme_mod( 'bonus_color_1' ),
		),
		array(
			'label' => 'bonus_color_2',
			'hex' => get_theme_mod( 'bonus_color_2' ),
		),
	);
		
	echo '<style>';
		foreach ( $colors as $color ) {
			printf(
				'
					:root {
						--%s: %s;
					}
					
					.has-%s-color {
						color: %s;
					}
					
					.has-%s-background-color {
						background-color: %s;
					}
				',
				$color['label'],
				$color['hex'],
				$color['label'],
				$color['hex'],
				$color['label'],
				$color['hex'],
			);
		}
	echo '</style>';
}

//* Add the colors to the customizer
add_action( 'after_setup_theme', 'urban_register_colors' );
function urban_register_colors() {
	
	$primary_color 		= get_theme_mod( 'primary_color' );
	$secondary_color 	= get_theme_mod( 'secondary_color' );
	$light			 	= get_theme_mod( 'light' );
	$default		 	= get_theme_mod( 'default_text' );
	$link		 		= get_theme_mod( 'default_button_link' );
	$bonus_color_1		= get_theme_mod( 'bonus_color_1' );
	$bonus_color_2		= get_theme_mod( 'bonus_color_2' );
	
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'White', 'brindle_urban' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Light', 'brindle_urban' ),
				'slug' => 'light',
				'color' => $light,
			),
			array(
				'name'  => esc_html__( 'Default', 'brindle_urban' ),
				'slug' => 'default',
				'color' => $default,
			),
			array(
				'name'  => esc_html__( 'Primary', 'brindle_urban' ),
				'slug' => 'primary',
				'color' => $primary_color,
			),
			array(
				'name'  => esc_html__( 'Secondary', 'brindle_urban' ),
				'slug' => 'secondary',
				'color' => $secondary_color,
			),			
			array(
				'name'  => esc_html__( 'link', 'brindle_urban' ),
				'slug' => 'link',
				'color' => $link,
			),
			array(
				'name'  => esc_html__( 'bonus_color_1', 'brindle_urban' ),
				'slug' => 'bonus_color_1',
				'color' => $bonus_color_1,
			),
			array(
				'name'  => esc_html__( 'bonus_color_2', 'brindle_urban' ),
				'slug' => 'bonus_color_2',
				'color' => $bonus_color_2,
            ),
		)
	);
}