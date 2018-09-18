<?php
/*
Plugin Name: My First Plugin
*/

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts', 99);
function callback_for_setting_up_scripts() {
    wp_register_style( 'myfirstpluginmain', plugins_url('main.css' , __FILE__) );
    wp_enqueue_style('myfirstpluginmain');
    wp_enqueue_script('myfirstpluginmain' , plugins_url('main.js' , __FILE__) , array('jquery'), null, true );
}
// [my_shortcode]
function my_shortcode_func($atts) {
    $number = mt_rand(1 , 5);
    ob_start();
    ?>
    <ul>
        <li><a href="#thecariboo">The Cariboo</a></li>
        <li><a href="#thechilcotin">The Chilcotin</a></li>
        <li><a href="#thecoast">The Coast</a></li>
    </ul>
    <img src="<?php echo plugins_url('img/tree.jpg' , __FILE__); ?>" alt="tree">
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode ('my_shortcode','my_shortcode_func');
