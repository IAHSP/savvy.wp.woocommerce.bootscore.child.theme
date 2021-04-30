<?php

  // style and scripts
   add_action( 'wp_enqueue_scripts', 'bootscore_5_child_enqueue_styles' );
   function bootscore_5_child_enqueue_styles() {
         
         // parent style.css
         wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/style.css' ); 
         // child
         wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
         $childCSS = get_stylesheet_directory_uri() . '/style.css';
         error_log($childCSS);
         
         // custom.js
         wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);

     } 

    // WooCommerce
    require get_template_directory() . '/woocommerce/woocommerce-functions.php';
