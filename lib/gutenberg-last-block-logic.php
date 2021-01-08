<?php

/**
 * Our main function that is going to control and run all the others 
 *
 * @return  [type]  [return description]
 */
add_action( 'wp_head', 'elodin_last_block_logic' );
function elodin_last_block_logic() {

    // bail if we're not looking at a full-width layout
    if ( 'full-width-content' !== genesis_site_layout() )
        return;

    // bail if it's not singular or if gutenberg isn't active
    if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks') )
		return;

    // bail if there aren't any blocks 
	if ( ! has_blocks() )
        return;

    // get the name of the last block
    $lastblock = elodin_detect_last_block_name();
    // echo $lastblock;

    // match the name of the last block to our list of "section" blocks
    $is_section = elodin_is_last_block_section( $lastblock );

    // bail if we didn't match
    if ( $is_section !== true )
        return;

    //* Add the body class
    add_filter( 'body_class', 'elodin_add_body_class_for_last_block' );

}

/**
 * Detect the last block and return the name of that block
 *
 * @return  string  the name of the last block
 */
function elodin_detect_last_block_name() {
        
    $post_object = get_post( get_the_ID() );
    $blocks      = (array) parse_blocks( $post_object->post_content );

	// bail if there's no named block
    //* Get the "last" classes
	foreach ( $blocks as $block ) {
        $lastblockname = null;
        
        if ( $block['blockName'] ) {
            $blockname = $block['blockName'];
            $lastblockname = str_replace( '/', '-', $blockname );
        }
    }
    
    return $lastblockname;
    
}

/**
 * Figure out it the last block is a "section" type block, then return a bool true or false for that
 *
 * @param   string  $lastblock  the name of the last block
 *
 * @return  bool    false by default, true if the last block is a section block
 */
function elodin_is_last_block_section( $lastblock ) {
    
    // if there's no block, then just return false, no need to go further
    if ( !$lastblock )
        return false;

    $sectionblocks = array(
        'core-cover',
        'gutenberg-section',
        'genesis-blocks-gb-container',
        'genesis-blocks-gb-columns',
        'atomic-blocks-ab-container',
        'atomic-blocks-ab-columns',
        'acf-twocolumn',
        'acf-fullwidth',
        'core-group',
        'getwid-section',
        'uagb-section',
        'acf-section',
        'acf-checkerboard',
    );

    if ( in_array( $lastblock, $sectionblocks ) )
        return true;

    // by default, return false
    return false;
   
}

//* Add a body class for 'last-block-is-section
function elodin_add_body_class_for_last_block( $classes ) {
    $classes[] = 'last-block-is-section';
    return $classes;
}