<?php

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