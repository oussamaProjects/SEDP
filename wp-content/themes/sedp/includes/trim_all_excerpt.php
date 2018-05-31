<?php
function wp_trim_all_excerpt($text) { // Creates an excerpt if needed; and shortens the manual excerpt as well
    global $post;
    
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
    }

    $text = strip_shortcodes( $text ); // optional
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 30);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = explode(' ', $text, $excerpt_length + 1);

    if (count($words)> $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text /*. $excerpt_more*/;
    } else {
        $text = implode(' ', $words);
    }
    return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt'); 

?>