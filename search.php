<?php

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'elodin_do_search_loop' );
/**
 * Outputs a custom loop
 *
 * @global mixed $paged current page number if paginated
 * @return void
 */
function elodin_do_search_loop() {

    echo '<div class="search-form-custom">';
        echo get_search_form();
    echo '</div>';

    if ( have_posts() ) : while ( have_posts() ) : the_post();

            $title = get_the_title();
            $permalink = get_the_permalink();
            $prettylink = preg_replace( "#^[^:/.]*[:/]+#i", "", preg_replace( "{/$}", "", urldecode( $permalink ) ) ); 

    		do_action( 'genesis_before_entry' );

    		printf( '<article %s>', genesis_attr( 'entry' ) );

            printf( '<a class="google-style-link" href="%s">%s</a>', $permalink, $prettylink );
                printf( '<h2 class="search-heading"><a href="%s">%s</a></h2>', $permalink, $title );
                the_excerpt();

    		echo '</article>';

    		do_action( 'genesis_after_entry' );

    	endwhile; //* end of one post
    	do_action( 'genesis_after_endwhile' );

    else : //* if no posts exist
    	do_action( 'genesis_loop_else' );
    endif; //* end loop
}

genesis();