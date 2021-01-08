<?php

// Disable custom font sizes
add_theme_support( 'disable-custom-font-sizes' );

// Editor Font Sizes
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => __( 'Small', 'elodin-twentynineteen' ),
		'shortName' => __( 'S', 'elodin-twentynineteen' ),
		'size'      => 13,
		'slug'      => 'small'
	),
	array(
		'name'      => __( 'Normal', 'elodin-twentynineteen' ),
		'shortName' => __( 'M', 'elodin-twentynineteen' ),
		'size'      => 18,
		'slug'      => 'normal'
	),
	array(
		'name'      => __( 'Large', 'elodin-twentynineteen' ),
		'shortName' => __( 'L', 'elodin-twentynineteen' ),
		'size'      => 22,
		'slug'      => 'large'
	),
	array(
		'name'      => __( 'Larger', 'elodin-twentynineteen' ),
		'shortName' => __( 'XL', 'elodin-twentynineteen' ),
		'size'      => 26,
		'slug'      => 'larger'
	),
) );