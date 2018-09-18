<?php
/*
Plugin Name: My First Plugin
*/
// [my_shortcode]
function my_shortcode_func($atts) {
    return "whatever text works";
}
add_shortcode ('myshortcode','my_shortcode_func');
