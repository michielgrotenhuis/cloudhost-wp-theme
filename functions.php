<?php
/**
 * CloudHost Pro Theme Functions
 * 
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function cloudhost_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '000000',
        'width'              => 1920,
        'height'             => 1080,
        'flex-height'        => true,
        'flex-width'         => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'f8fafc',
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cloudhost-pro'),
        'footer'  => esc_html__('Footer Menu', 'cloudhost-pro'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'cloudhost_theme_setup');

/**
 * Enqueue scripts and styles
 */
function cloudhost_scripts() {
    // Theme version
    $theme_version = wp_get_theme()->get('Version');

    // Enqueue styles - Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Main theme stylesheet (includes all custom CSS)
    wp_enqueue_style('cloudhost-style', get_stylesheet_uri(), array('font-awesome'), $theme_version);

    // Enqueue scripts
    wp_enqueue_script('cloudhost-main', get_template_directory_uri() . '/js/main.js', array('jquery'), $theme_version, true);

    // Localize script for AJAX
    wp_localize_script('cloudhost-main', 'cloudhost_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('cloudhost_nonce'),
    ));

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cloudhost_scripts');

/**
 * Register widget areas
 */
function cloudhost_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'cloudhost-pro'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'cloudhost-pro'),
        'before_widget' => '<div id="%1$s" class="widget bg-white rounded-lg shadow-md p-6 mb-6 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'cloudhost-pro'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in the first footer column.', 'cloudhost-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'cloudhost-pro'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here to appear in the second footer column.', 'cloudhost-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'cloudhost-pro'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here to appear in the third footer column.', 'cloudhost-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 4', 'cloudhost-pro'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here to appear in the fourth footer column.', 'cloudhost-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'cloudhost_widgets_init');

/**
 * Customizer additions
 */
function cloudhost_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('cloudhost_hero_section', array(
        'title'    => esc_html__('Hero Section', 'cloudhost-pro'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('cloudhost_hero_title', array(
        'default'           => esc_html__('Secure Luxembourg Cloud Hosting', 'cloudhost-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cloudhost_hero_title', array(
        'label'    => esc_html__('Hero Title', 'cloudhost-pro'),
        'section'  => 'cloudhost_hero_section',
        'type'     => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('cloudhost_hero_subtitle', array(
        'default'           => esc_html__('Your data stays in Luxembourg. GDPR-compliant, locally hosted cloud solutions with enterprise-grade security and 24/7 local support.', 'cloudhost-pro'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('cloudhost_hero_subtitle', array(
        'label'    => esc_html__('Hero Subtitle', 'cloudhost-pro'),
        'section'  => 'cloudhost_hero_section',
        'type'     => 'textarea',
    ));

    // Primary Button Text
    $wp_customize->add_setting('cloudhost_hero_button_text', array(
        'default'           => esc_html__('Start 30-Day Trial', 'cloudhost-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cloudhost_hero_button_text', array(
        'label'    => esc_html__('Primary Button Text', 'cloudhost-pro'),
        'section'  => 'cloudhost_hero_section',
        'type'     => 'text',
    ));

    // Primary Button URL
    $wp_customize->add_setting('cloudhost_hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cloudhost_hero_button_url', array(
        'label'    => esc_html__('Primary Button URL', 'cloudhost-pro'),
        'section'  => 'cloudhost_hero_section',
        'type'     => 'url',
    ));

    // Company Information Section
    $wp_customize->add_section('cloudhost_company_info', array(
        'title'    => esc_html__('Company Information', 'cloudhost-pro'),
        'priority' => 35,
    ));

    // Company Name
    $wp_customize->add_setting('cloudhost_company_name', array(
        'default'           => esc_html__('CloudHost Pro', 'cloudhost-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cloudhost_company_name', array(
        'label'    => esc_html__('Company Name', 'cloudhost-pro'),
        'section'  => 'cloudhost_company_info',
        'type'     => 'text',
    ));

    // Footer Copyright
    $wp_customize->add_setting('cloudhost_footer_copyright', array(
        'default'           => esc_html__('© 2025 CloudHost Pro. All rights reserved.', 'cloudhost-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cloudhost_footer_copyright', array(
        'label'    => esc_html__('Footer Copyright Text', 'cloudhost-pro'),
        'section'  => 'cloudhost_company_info',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'cloudhost_customize_register');

/**
 * Custom excerpt length
 */
function cloudhost_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'cloudhost_excerpt_length');

/**
 * Custom excerpt more
 */
function cloudhost_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cloudhost_excerpt_more');

/**
 * Add custom body classes
 */
function cloudhost_body_classes($classes) {
    // Add a class for the current page type
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }
    
    if (is_home()) {
        $classes[] = 'is-blog-home';
    }

    return $classes;
}
add_filter('body_class', 'cloudhost_body_classes');

/**
 * Add custom post classes
 */
function cloudhost_post_classes($classes, $class, $post_id) {
    $classes[] = 'bg-white';
    $classes[] = 'rounded-lg';
    $classes[] = 'shadow-md';
    $classes[] = 'overflow-hidden';
    $classes[] = 'mb-8';

    return $classes;
}
add_filter('post_class', 'cloudhost_post_classes', 10, 3);

/**
 * Custom comment callback
 */
function cloudhost_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('bg-gray-50 rounded-lg p-4 mb-4'); ?>>
        <div class="comment-author vcard flex items-center mb-2">
            <?php echo get_avatar($comment, 40, '', '', array('class' => 'rounded-full mr-3')); ?>
            <div>
                <strong><?php comment_author(); ?></strong>
                <div class="comment-meta text-sm text-gray-600">
                    <time datetime="<?php comment_time('c'); ?>">
                        <?php comment_date(); ?> at <?php comment_time(); ?>
                    </time>
                </div>
            </div>
        </div>
        <div class="comment-content">
            <?php comment_text(); ?>
        </div>
        <div class="reply mt-2">
            <?php comment_reply_link(array_merge($args, array(
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'class'     => 'text-primary hover:text-secondary text-sm'
            ))); ?>
        </div>
    </li>
    <?php
}

/**
 * Pagination function
 */
function cloudhost_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
    ));

    if (is_array($pages)) {
        echo '<nav class="pagination flex justify-center items-center space-x-2 mt-8" role="navigation">';
        foreach ($pages as $page) {
            echo '<span class="page-item">' . $page . '</span>';
        }
        echo '</nav>';
    }
}

/**
 * Add custom CSS for Tailwind configuration
 */
function cloudhost_custom_css() {
    ?>
    <style id="cloudhost-custom-css">
        /* Custom Tailwind configuration will be loaded via JavaScript */
    </style>
    <?php
}
add_action('wp_head', 'cloudhost_custom_css');

/**
 * Security enhancements
 */
// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Remove unnecessary meta tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/**
 * Performance optimizations
 */
// Remove emoji scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable XML-RPC if not needed
add_filter('xmlrpc_enabled', '__return_false');