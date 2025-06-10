<?php
/**
 * The header for CloudHost Pro theme - Lifestyle Edition
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'cloudhost-pro'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <!-- Logo/Brand -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php 
                        $site_name = get_bloginfo('name');
                        if ($site_name) {
                            echo esc_html($site_name);
                        } else {
                            esc_html_e('LuxHost', 'cloudhost-pro');
                        }
                        ?>
                    </a>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <!-- Navigation -->
            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'cloudhost_pro_fallback_menu',
                ));
                ?>
                
                <!-- Header CTA Button -->
                <a href="<?php echo esc_url(get_theme_mod('cloudhost_header_cta_url', '#pricing')); ?>" class="header-cta">
                    <?php echo esc_html(get_theme_mod('cloudhost_header_cta_text', __('Get Started', 'cloudhost-pro'))); ?>
                </a>
            </nav><!-- #site-navigation -->
        </div><!-- .container -->
    </header><!-- #masthead -->

<?php
/**
 * Fallback menu function
 */
function cloudhost_pro_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'cloudhost-pro') . '</a></li>';
    echo '<li><a href="#discover">' . esc_html__('Features', 'cloudhost-pro') . '</a></li>';
    echo '<li><a href="#pricing">' . esc_html__('Pricing', 'cloudhost-pro') . '</a></li>';
    echo '<li><a href="#testimonials">' . esc_html__('Testimonials', 'cloudhost-pro') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . esc_html__('Contact', 'cloudhost-pro') . '</a></li>';
    echo '</ul>';
}

// Add scroll effect with JavaScript
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // Mobile menu toggle
    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            navigation.classList.toggle('toggled');
            const expanded = navigation.classList.contains('toggled');
            menuToggle.setAttribute('aria-expanded', expanded);
            
            // Change icon
            const icon = menuToggle.querySelector('i');
            if (expanded) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = header.offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (navigation.classList.contains('toggled')) {
                    navigation.classList.remove('toggled');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.querySelector('i').className = 'fas fa-bars';
                }
            }
        });
    });
});
</script>