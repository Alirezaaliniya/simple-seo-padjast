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
        'تنظیمات سئو',   // Page title
        'تنظیمات سئو',            // Menu title
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
            submit_button('ذخیره تنظیمات سئو');           // Output save settings button
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
        'تنظیمات سئو',                  // Section Title
        'padjast_section_callback',      // Callback function to display the section description
        'padjast_seo'                    // Page to display the section
    );

    // Add a new field for "Google Code"
    add_settings_field(
        'padjast_google_code',           // Field ID
        'کد سرچ کنسول',                   // Field Title
        'padjast_google_code_callback',  // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );

    // Add a new field for "SEO Title"
    add_settings_field(
        'padjast_seo_title',             // Field ID
        'تایتل سئو',                     // Field Title
        'padjast_seo_title_callback',    // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );

    // Add a new field for "Description SEO"
    add_settings_field(
        'padjast_description_seo',       // Field ID
        'دیسکریپشن سئو',               // Field Title
        'padjast_description_seo_callback', // Callback function to display the field
        'padjast_seo',                   // Page to display the field
        'padjast_seo_section'            // Section to display the field
    );
}

// Section callback function
function padjast_section_callback() {
    echo '<p>تنظیمات سئو را در پایین درج کنید:</p>';
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


