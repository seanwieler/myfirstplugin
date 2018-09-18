<?php
/*
Plugin Name: My First Plugin
*/
// [my_shortcode]
function my_shortcode_func($atts) {
    ob_start();
    ?>
    <ul>
        <li><a href="#thecariboo">The Cariboo</a></li>
        <li><a href="#thechilcotin">The Chilcotin</a></li>
        <li><a href="#thecoast">The Coast</a></li>
    </ul>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode ('my_shortcode','my_shortcode_func');
