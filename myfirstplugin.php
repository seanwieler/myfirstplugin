<?php
/*
Plugin Name: Shortcode Quiz Plugin
*/

add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts', 99);
function callback_for_setting_up_scripts() {
    wp_register_style( 'myfirstpluginmain', plugins_url('main.css' , __FILE__) );
    wp_enqueue_style('myfirstpluginmain');
    wp_enqueue_script('myfirstpluginmain' , plugins_url('main.js' , __FILE__) , array('jquery'), null, true );
}
// [random_image]
function random_image_func($atts) {
    $number = mt_rand(1 , 5);
    ob_start();
    if($number == 1){
    ?>
	<img src="<?php echo plugins_url('img/tree.jpg' , __FILE__); ?>" alt="tree">
    <?php
    } elseif ($number == 2) {
    ?>
    <img src="<?php echo plugins_url('img/nature-wallpaper.jpeg' , __FILE__); ?>" alt="nature1">
	<?php
	} elseif($number == 3) {
    ?>
	<img src="<?php echo plugins_url('img/naturewallpaper.jpg' , __FILE__); ?>" alt="nature2">
    <?php
    } elseif($number == 4) {
    ?>
    <img src="<?php echo plugins_url('img/wallpapers24.jpg' , __FILE__); ?>" alt="nature3">
    <?php
    } else {
    ?>
    <img src="<?php echo plugins_url('img/tree.jpg' , __FILE__); ?>" alt="tree">
    <?php }
    $output = ob_get_clean();
    return $output;
add_shortcode ('random_image' , 'random_image_func');
?>
