<?php

/**
 * Our main function that is going to control and run all the others 
 *
 * @return  [type]  [return description]
 */
add_action( 'wp_head', 'elodin_first_block_logic' );
function elodin_first_block_logic() {

    // bail if we're not looking at a full-width layout
    if ( 'full-width-content' !== genesis_site_layout() )
        return;

    // bail if it's not singular or if gutenberg isn't active
    if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks') )
		return;

    // bail if there aren't any blocks 
	if ( ! has_blocks() )
        return;

    // get the name of the first block
    $firstblock = elodin_detect_first_block_name();
    // echo $firstblock;

    // match the name of the first block to our list of "section" blocks
    $is_section = elodin_is_first_block_section( $firstblock );

    // bail if we didn't match
    if ( $is_section !== true )
        return;

    //* Add the body class
    add_filter( 'body_class', 'elodin_add_body_class_for_first_block' );

    //* Remove the entry header markup (requires HTML5 theme support)
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
    remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

}

/**
 * Detect the first block and return the name of that block
 *
 * @return  string  the name of the first block
 */
function elodin_detect_first_block_name() {
        
    $post_object = get_post( get_the_ID() );
    $blocks      = (array) parse_blocks( $post_object->post_content );

	// bail if there's no named block
    if ( ! isset( $blocks[0]['blockName'] ) )
        return null;

    // get the name of the block
    $firstblockname = str_replace( '/', '-', $blocks[0]['blockName'] );
    
    return $firstblockname;
    
}

/**
 * Figure out it the first block is a "section" type block, then return a bool true or false for that
 *
 * @param   string  $firstblock  the name of the first block
 *
 * @return  bool    false by default, true if the first block is a section block
 */
function elodin_is_first_block_section( $firstblock ) {

    // if there's no block, then just return false, no need to go further
    if ( !$firstblock )
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

    if ( in_array( $firstblock, $sectionblocks ) )
        return true;

    // by default, return false
    return false;
   
}

//* Add a body class for 'first-block-is-section
function elodin_add_body_class_for_first_block( $classes ) {
    $classes[] = 'first-block-is-section';
    return $classes;
}