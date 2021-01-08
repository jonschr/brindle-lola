<?php

// Add specific CSS class by filter
add_filter( 'body_class', 'elodin_logged_in_out_bodyclass' );
function elodin_logged_in_out_bodyclass($classes) {
    
    if( is_user_logged_in() ) {
        $classes[] = 'logged-in';
    } else {
        $classes[] = 'logged-out';
    }

    // return the $classes array
    return $classes;

}