<?php
/*
Plugin Name: Shortcode Quiz Plugin
Description: This plugin generates a random number and uses it to output a random photo
Author: Sean Wieler
*/

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts', 99);
function callback_for_setting_up_scripts() {
    wp_register_style('myfirstpluginmain', plugins_url('main.css' , __FILE__) );
    wp_enqueue_style('myfirstpluginmain');
    wp_enqueue_script('myfirstpluginmain' , plugins_url('main.js' , __FILE__) , array('jquery'), null, true );
}
//[random_image]
function random_image_func($atts) {
    $number = mt_rand(1 , 5);
    ob_start();
    if($number == 1){
    ?>
	<img src="<?php echo plugins_url('img/image1.jpg' , __FILE__); ?>" class="resize" alt="image1">
    <?php
    } elseif ($number == 2) {
    ?>
    <img src="<?php echo plugins_url('img/image2.jpeg' , __FILE__); ?>" class="resize" alt="image2">
	<?php
	} elseif($number == 3) {
    ?>
	<img src="<?php echo plugins_url('img/image3.jpg' , __FILE__); ?>" class="resize" alt="image3">
    <?php
    } elseif($number == 4) {
    ?>
    <img src="<?php echo plugins_url('img/image4.jpg' , __FILE__); ?>" class="resize" alt="image4">
    <?php
    } else {
    ?>
    <img src="<?php echo plugins_url('img/image5.jpg' , __FILE__); ?>" class="resize" alt="image5">
    <?php }
    $output = ob_get_clean();
    return $output;
    }
add_shortcode ('random_image' , 'random_image_func');