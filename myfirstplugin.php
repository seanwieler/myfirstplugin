<?php
/*
Plugin Name: Shortcode Quiz Plugin
Description: This plugin generates a random number and uses it to output a random photo
Author: Sean Wieler
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!');

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts', 99);
function callback_for_setting_up_scripts() {
    wp_register_style('shrtcdepluginmain', plugins_url('main.css' , __FILE__) );
    wp_enqueue_style('shrtcdepluginmain');
    wp_enqueue_script('shrtcdepluginmain' , plugins_url('main.js' , __FILE__) , array('jquery'), null, true );
}
add_action('get_footer', 'my_footer_meddler');
function my_footer_meddler() {
    $settings = pods('custom_settings');
	$maps_key = $settings->field( 'maps_key' );
?>
<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/view?zoom=13&center=48.4284%2C-123.3656&key=<?php echo $maps_key; ?>" allowfullscreen></iframe>
<?php
}
add_filter("the_content", "adding_text");
function adding_text($content) {
    return str_replace('page', 'book' , $content);
}
add_action('get_header' , 'add_logo');
function add_logo() {
    do_shortcode("[random_image]");
    error_log("try to add logo");
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