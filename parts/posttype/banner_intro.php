<?php
//register post type theme
add_action( 'init', 'codex_cleanblog_banner_intro_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_cleanblog_banner_intro_init() {
  $labels = array(
    'name'               => _x( 'Banner', 'post type general name', 'cleanblog_theme' ),
    'singular_name'      => _x( 'Banner', 'post type singular name', 'cleanblog_theme' ),
    'menu_name'          => _x( 'Banner', 'admin menu', 'cleanblog_theme' ),
    'name_admin_bar'     => _x( 'Banner', 'add new on admin bar', 'cleanblog_theme' ),
    'add_new'            => _x( 'Add New', 'theme', 'cleanblog_theme' ),
    'add_new_item'       => __( 'Add New Banner', 'cleanblog_theme' ),
    'new_item'           => __( 'New Banner', 'cleanblog_theme' ),
    'edit_item'          => __( 'Edit Banner', 'cleanblog_theme' ),
    'view_item'          => __( 'View Banner', 'cleanblog_theme' ),
    'all_items'          => __( 'All Banner', 'cleanblog_theme' ),
    'search_items'       => __( 'Search Banner', 'cleanblog_theme' ),
    'parent_item_colon'  => __( 'Parent Banner:', 'cleanblog_theme' ),
    'not_found'          => __( 'No Banner found.', 'cleanblog_theme' ),
    'not_found_in_trash' => __( 'No banner found in Trash.', 'cleanblog_theme' )
  );

  $args = array(
    'labels'             => $labels,
                'description'        => __( 'Description. ', 'cleanblog_theme' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'banner' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( 'banner', $args );
}
function cleanblog_category_banner_intro_init() {
    // create a new taxonomy
    register_taxonomy(
        'category_banner',
        'banner',
        array(
            'labels' => array(
                'name' => 'Categories ',
                'add_new_item' => 'Add New Categories',
                'new_item_name' => "New Categories Type"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    }
    add_action( 'init', 'cleanblog_category_banner_intro_init' );
?>