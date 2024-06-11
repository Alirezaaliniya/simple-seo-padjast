<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


$options = get_option('padjast_seo_settings');
$google_code = isset($options['google_code']) ? $options['google_code'] : '';
$seo_title = isset($options['seo_title']) ? $options['seo_title'] : '';
$description_seo = isset($options['description_seo']) ? $options['description_seo'] : '';


function padjast_render_head() {
    global $description_seo;
    global $seo_title;
    global $google_code;

    ?>
    <?php echo $google_code;?>

    <meta name="twitter:title" content="<?php echo esc_attr($seo_title);?>">
    <meta property="og:site_name" content="<?php echo esc_attr($seo_title);?>">
    <meta property="og:title" content="<?php echo esc_attr($seo_title);?>">
    
    <meta name="twitter:description" content="<?php echo esc_attr($description_seo); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description_seo); ?>">
    <meta name="description" content="<?php echo esc_attr($description_seo); ?>">







    <?php
}

add_action('wp_head', 'padjast_render_head' , 1);

