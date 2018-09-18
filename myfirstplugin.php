<?php
/*
Plugin Name: My First Plugin
*/
// [my_shortcode]
function my_shortcode_func($atts) {
    return "whatever text works";
}
add_shortcode ('my_shortcode','my_shortcode_func');
