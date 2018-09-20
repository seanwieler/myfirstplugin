<?php
/*
Plugin Name: Shortcode Quiz Plugin
Author: Sean Wieler
*/

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts', 99);
function callback_for_setting_up_scripts() {
    wp_register_style('shortcodequizpluginmain', plugins_url('main.css' , __FILE__) );
    wp_enqueue_style('shortcodequizpluginmain');
    wp_enqueue_script('shortcodequizpluginmain' , plugins_url('main.js' , __FILE__) , array('jquery'), null, true );
}
//[random_image]
function random_image_func($atts) {
    $number = mt_rand(1 , 5);
    ob_start();
    if($number == 1){
    ?>
	<img class="resize" src="<?php echo plugins_url('img/image1.jpg' , __FILE__); ?>" alt="image1">
    <?php
    } elseif ($number == 2) {
    ?>
    <img class="resize" src="<?php echo plugins_url('img/image2.jpeg' , __FILE__); ?>" alt="image2">
	<?php
	} elseif($number == 3) {
    ?>
	<img class="resize" src="<?php echo plugins_url('img/image3.jpg' , __FILE__); ?>" alt="image3">
    <?php
    } elseif($number == 4) {
    ?>
    <img class="resize" src="<?php echo plugins_url('img/image4.jpg' , __FILE__); ?>" alt="image4">
    <?php
    } else {
    ?>
    <img class="resize" src="<?php echo plugins_url('img/image5.jpg' , __FILE__); ?>" alt="image5">
    <?php }
    $output = ob_get_clean();
    return $output;
    return $number;
    }
add_shortcode ('random_image' , 'random_image_func');