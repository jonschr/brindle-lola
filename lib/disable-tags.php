<?php

// Remove tags support from posts
function elodin_twentynineteen_remove_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'elodin_twentynineteen_remove_tags');