<?php

//add custom post type(INFORMATION)
add_action( 'init', 'add_post_type_event', 0 );
function add_post_type_event() {
  register_post_type(
  'information',
   array(
     'labels' => array(
      'name' => 'INFORMATION',
      ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title','editor','excerpt','thumbnail','author','revisions'),
        //'show_in_rest' => true,
        )
    );
    register_taxonomy(
      'information_category',
      'information',
      array(
        'hierarchical' => true,
        'label' => 'カテゴリ',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'singular_label' => 'カテゴリ',
        //'show_in_rest' => true,
        )
      );
}
