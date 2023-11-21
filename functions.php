<?php

function new_excerpt_more($post) {
    return ' <a href="'. esc_url( get_permalink() ) . '">' . '…続きを読む' . '</a>';    
}    
add_filter('excerpt_more', 'new_excerpt_more');

function my_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/sample.js',array('jquery'));
  }
  add_action( 'wp_enqueue_scripts', 'my_scripts' );

  add_theme_support( 'post-thumbnails' );
?>