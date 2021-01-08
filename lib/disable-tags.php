<?php

// Remove tags support from posts
function urban_remove_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'urban_remove_tags');