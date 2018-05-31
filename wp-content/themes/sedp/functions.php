<?php



// load all files with the pattern class-*.php from the directory classes
foreach( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $class )
    require_once $class;

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
  'menu'            => __( 'Menu','SEDP' ),
  'menu_bottom'     => __( 'Menu bottom','SEDP' ),
  'menu_footer_1'   => __( 'Menu footer 1','SEDP' ),
  'menu_footer_2'   => __( 'Menu footer 2','SEDP' ),
));
add_theme_support( 'post-thumbnails' );

register_sidebar(array(
	'name' => 'Newsletter',
	'id'   => 'newsletter_1',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
));

add_action( 'template_redirect', 'wp_change_search_url_rewrite' );
function wp_change_search_url_rewrite() {
	if ( is_search() && !empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}	
}

// Add Filter Hook
add_filter( 'post_mime_types', 'modify_post_mime_types' );
function modify_post_mime_types( $post_mime_types ) {
 
    // select the mime type, here: 'application/pdf'
    // then we define an array with the label values
    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
 
    // then we return the $post_mime_types variable
    return $post_mime_types;
}

// search all taxonomies, based on: http://projects.jesseheap.com/all-projects/wordpress-plugin-tag-search-in-wordpress-23
function atom_search_where($where){ 
    global $wpdb, $wp_query;
    if (is_search()) {
        $search_terms = get_query_var( 'search_terms' );

        $where .= " OR (";
        $i = 0;
        foreach ($search_terms as $search_term) {
            $i++;
            $search_term = addslashes($search_term);
            if ($i>1) $where .= " AND";     // --- make this OR if you prefer not requiring all search terms to match taxonomies
            $where .= " (t.name LIKE '%".$search_term."%')";
        }
        $where .= " AND {$wpdb->posts}.post_status = 'publish')";
    }
    return $where;
}

function atom_search_join($join){
  global $wpdb;
  if (is_search())
    $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
  return $join;
}

function atom_search_groupby($groupby){
  global $wpdb;

  // we need to group on post ID
  $groupby_id = "{$wpdb->posts}.ID";
  if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;

  // groupby was empty, use ours
  if(!strlen(trim($groupby))) return $groupby_id;

  // wasn't empty, append ours
  return $groupby.", ".$groupby_id;
}

add_filter('posts_where','atom_search_where');
add_filter('posts_join', 'atom_search_join');
add_filter('posts_groupby', 'atom_search_groupby');

/*function filter_search($query) {
    if (is_search() && ! is_admin() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'projets', 'publicationsas', 'metiersas', 'partenaires', 'page', 'offre_recrutement'));
        $query->set('posts_per_page', '7');
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');*/


function my_custom_post_type_archive_where($where,$args){  
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);


