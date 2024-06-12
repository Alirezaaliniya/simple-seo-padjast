<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


add_action( 'admin_enqueue_scripts', 'padjast_admin_style' );

function padjast_admin_style(){
    wp_enqueue_style( 'padjast_seo_style', PADJAST_ADMIN_URL . '/admin-style.css' );
}


// Hook to add the settings page to the admin menu
add_action('admin_menu', 'padjast_add_admin_menu');

function padjast_add_admin_menu() {
    // Add a new top-level menu
    add_menu_page(
        'تنظیمات اتصال به گوگل',   // Page title
        'تنظیمات اتصال به گوگل',            // Menu title
        'manage_options',         // Capability
        'padjast_seo',            // Menu slug
        'padjast_options_page',   // Callback function to render the options page
        'dashicons-admin-generic', // Icon URL or dashicon class for the menu
        5                         // Position in the menu order
    );
}

// Render the settings page
function padjast_options_page() {
    ?>
    <div class="wrap">
        <form action="options.php" method="post">
            <?php
            settings_fields('padjast_options_group'); // Output security fields for the registered setting "padjast"
            do_settings_sections('padjast_seo');      // Output settings sections and their fields
            submit_button('ذخیره تنظیمات اتصال به گوگل');           // Output save settings button
            ?>
        </form>
    </div>
    <?php
}

// Hook to initialize settings
add_action('admin_init', 'padjast_register_settings');

function padjast_register_settings() {
    // Register a new setting for "padjast" page.
    register_setting('padjast_options_group', 'padjast_seo_settings');

    // Add a new section in the "padjast" page.
    add_settings_section(
        'padjast_seo_section',           // Section ID
        'تنظیمات اتصال به گوگل',                  // Section Title
        'padjast_section_callback',      // Callback function to display the section description
        'padjast_seo'                    // Page to display the section
    );

    // Add a new field for "Google Code"
    add_settings_field(
        'padjast_google_code',           // Field ID
        'کد HTML tag گوگل سرچ کنسول:',                   // Field Title
        'padjast_google_code_callback',  // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );

    // Add a new field for "SEO Title"
    add_settings_field(
        'padjast_seo_title',             // Field ID
        'عنوان (Title) لندینگ: 60 کاراکتر',                     // Field Title
        'padjast_seo_title_callback',    // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );

    // Add a new field for "Description SEO"
    add_settings_field(
        'padjast_description_seo',       // Field ID
        'توضیحات (Description) لندینگ:  160 کاراکتر',               // Field Title
        'padjast_description_seo_callback', // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );
}

// Section callback function
function padjast_section_callback() {
    echo '<p>تنظیمات اتصال لندینگ به موتور جستجو گوگل</p>';
}

// Field callback function for "Google Code"
function padjast_google_code_callback() {
    $options = get_option('padjast_seo_settings');
    $google_code = isset($options['google_code']) ? esc_attr($options['google_code']) : '';
    echo '<input type="text" name="padjast_seo_settings[google_code]" value="' . $google_code . '" />';
}

// Field callback function for "SEO Title"
function padjast_seo_title_callback() {
    $options = get_option('padjast_seo_settings');
    $seo_title = isset($options['seo_title']) ? esc_attr($options['seo_title']) : '';
    echo '<input type="text" name="padjast_seo_settings[seo_title]" value="' . $seo_title . '" />';
}

// Field callback function for "Description SEO"
function padjast_description_seo_callback() {
    $options = get_option('padjast_seo_settings');
    $description_seo = isset($options['description_seo']) ? esc_attr($options['description_seo']) : '';
    echo '<textarea name="padjast_seo_settings[description_seo]" rows="5" cols="50">' . $description_seo . '</textarea>';
}







///learn how use padjast

// Add a new menu item for "Padjast Learn"
//پیشخوان وردپرس خوش آمدید
//
// تابعی برای نمایش باکس خوش آمدید
function padjast_custom_dashboard_widget() {
    echo '<div class="welcome-box">
	<img src="'. PADJAST_ADMIN_URL .'/logo.svg" >
        <h2>به لندینگ پادجست خوش آمدید!</h2>
        <p>پادجست به شما کمک میکند تا در سریع ترین زمان ممکن وبسایت شخصی خود را راه اندازی کنید</p>
		<p>جهت تنظیم سایت خود روی تنظیمات کلیک کنید</p>
		<a href="https://padjast.ir/my-account/support/">در صورت وجود ابهام یا مشکل سوال خود را  از طریق تیکت موجود در پنل کاربری padjast.ir مطرح کنید</a>
    </div>
	<style>
	.welcome-box {
    display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;
    justify-content: center;
p , h2 , a{
text-align:center;
}

}
	</style>
	';
}
function padjast_custom_dashboard_widget_2() {
    echo '<div class="welcome-box">
<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/otho509/vt/frame"  allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
    </div>';
}

function padjast_custom_dashboard_widget_3() {
    echo '<div class="welcome-box">
<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}.h_iframe-aparat_embed_frame {
    height: 100%;
    width: 100%;
}
</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/b90c8sh/vt/frame"  allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
    </div>';
}


// تابعی برای اضافه کردن باکس خوش آمدید به پیشخوان
function add_custom_dashboard_widget() {
    wp_add_dashboard_widget('padjast_custom_dashboard_widget', 'خوش آمدید', 'padjast_custom_dashboard_widget');
    wp_add_dashboard_widget('padjast_custom_dashboard_widget_2', 'آموزش تنظیمات', 'padjast_custom_dashboard_widget_2');
    wp_add_dashboard_widget('padjast_custom_dashboard_widget_3', 'آموزش سئو', 'padjast_custom_dashboard_widget_3');
}

// اضافه کردن فیلتر برای فراخوانی تابع add_custom_dashboard_widget در زمان مناسب
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget' );


