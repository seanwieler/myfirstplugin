<?php
/*
Plugin Name: Shortcode Quiz Plugin
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
	<img src="<?php echo plugins_url('img/imge1.jpg' , __FILE__); ?>" class="resize" alt="image1">
    <?php
    } elseif ($number == 2) {
    ?>
    <img src="<?php echo plugins_url('img/imge2.jpeg' , __FILE__); ?>" class="resize" alt="image2">
	<?php
	} elseif($number == 3) {
    ?>
	<img src="<?php echo plugins_url('img/iage3.jpg' , __FILE__); ?>" class="resize" alt="image3">
    <?php
    } elseif($number == 4) {
    ?>
    <img src="<?php echo plugins_url('img/imge4.jpg' , __FILE__); ?>" class="resize" alt="image4">
    <?php
    } else {
    ?>
    <img src="<?php echo plugins_url('img/imae5.jpg' , __FILE__); ?>" class="resize" alt="image5">
    <?php }
    $output = ob_get_clean();
    return $output;
    return $number;
    }
add_shortcode ('random_image' , 'random_image_func');