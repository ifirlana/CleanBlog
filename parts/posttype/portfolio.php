<?php
//register post type theme portfolio
add_action( 'init', 'codex_portfolio_cleanblog_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_portfolio_cleanblog_init() {
  $labels = array(
    'name'               => _x( 'Portfolio', 'post type general name', 'mekar_theme' ),
    'singular_name'      => _x( 'Portfolio', 'post type singular name', 'mekar_theme' ),
    'menu_name'          => _x( 'Portfolio', 'admin menu', 'mekar_theme' ),
    'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'mekar_theme' ),
    'add_new'            => _x( 'Add New', 'theme', 'mekar_theme' ),
    'add_new_item'       => __( 'Add New Portfolio', 'mekar_theme' ),
    'new_item'           => __( 'New Portfolio', 'mekar_theme' ),
    'edit_item'          => __( 'Edit Portfolio', 'mekar_theme' ),
    'view_item'          => __( 'View Portfolio', 'mekar_theme' ),
    'all_items'          => __( 'All Portfolio', 'mekar_theme' ),
    'search_items'       => __( 'Search Portfolio', 'mekar_theme' ),
    'parent_item_colon'  => __( 'Parent Portfolio:', 'mekar_theme' ),
    'not_found'          => __( 'No Portfolio found.', 'mekar_theme' ),
    'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'mekar_theme' )
  );

  $args = array(
    'labels'             => $labels,
                'description'        => __( 'Description. ', 'mekar_theme' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'portfolio' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
  );

  register_post_type( 'portfolio', $args );
}
 function portfolio_category_cleanblog_init() {
    // create a new taxonomy
    register_taxonomy(
        'category_portfolio_type',
        'portfolio',
        array(
            'labels' => array(
                'name' => 'Portfolio type ',
                'add_new_item' => 'Add New Type',
                'new_item_name' => "New Portfolio Type"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    }
    add_action( 'init', 'portfolio_category_cleanblog_init' );
?>