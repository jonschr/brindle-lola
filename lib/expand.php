<?php

function expand_list_func( $atts ) {
    ob_start();
    
    wp_enqueue_script( 'expand' );
    
    echo '<a href="#" class="button expand">View more</a>';
    
    return ob_get_clean();
}
add_shortcode( 'expand', 'expand_list_func' );
