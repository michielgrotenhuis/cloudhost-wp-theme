<?php
/**
 * The template for displaying the footer - Lifestyle Edition
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <!-- Brand Section -->
                <div class="footer-brand">
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
                    <p>
                        <?php 
                        $footer_description = get_theme_mod('cloudhost_footer_description', __('Premium cloud hosting solutions engineered for excellence. Where Luxembourg\'s financial precision meets cutting-edge technology.', 'cloudhost-pro'));
                        echo esc_html($footer_description);
                        ?>
                    </p>
                    
                    <!-- Social Icons -->
                    <div class="social-icons">
                        <?php if (get_theme_mod('cloudhost_twitter_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cloudhost_twitter_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('cloudhost_linkedin_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cloudhost_linkedin_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('cloudhost_github_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('cloudhost_github_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-github"></i>
                            </a>
                        <?php endif; ?>
                        
                        <!-- Default social links if none are set -->
                        <a href="#" target="_blank" rel="noopener">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Products Section -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Solutions', 'cloudhost-pro'); ?></h3>
                    <ul>
                        <li><a href="#"><?php esc_html_e('Cloud Hosting', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('WordPress Hosting', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('VPS Hosting', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Dedicated Servers', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Enterprise Solutions', 'cloudhost-pro'); ?></a></li>
                    </ul>
                </div>
                
                <!-- Support Section -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Support', 'cloudhost-pro'); ?></h3>
                    <ul>
                        <li><a href="#"><?php esc_html_e('Documentation', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Help Center', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Contact Support', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('System Status', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Migration Service', 'cloudhost-pro'); ?></a></li>
                    </ul>
                </div>
                
                <!-- Company Section -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Company', 'cloudhost-pro'); ?></h3>
                    <ul>
                        <li><a href="#"><?php esc_html_e('About Us', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Careers', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Blog', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Press Kit', 'cloudhost-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Partners', 'cloudhost-pro'); ?></a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>
                    <?php
                    $copyright_text = get_theme_mod('cloudhost_copyright_text', sprintf(
                        /* translators: 1: Copyright year, 2: Site name */
                        __('© %1$s %2$s. All rights reserved.', 'cloudhost-pro'),
                        date('Y'),
                        get_bloginfo('name') ?: 'LuxHost'
                    ));
                    echo esc_html($copyright_text);
                    ?>
                </p>
                
                <div class="footer-links">
                    <a href="#"><?php esc_html_e('Privacy Policy', 'cloudhost-pro'); ?></a>
                    <a href="#"><?php esc_html_e('Terms of Service', 'cloudhost-pro'); ?></a>
                    <a href="#"><?php esc_html_e('Cookie Policy', 'cloudhost-pro'); ?></a>
                    <a href="#"><?php esc_html_e('GDPR Compliance', 'cloudhost-pro'); ?></a>
                </div>
            </div>
        </div><!-- .footer-content -->
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Additional JavaScript for enhanced UX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation
    document.body.classList.add('loaded');
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.lifestyle-feature-card, .lifestyle-pricing-card, .lifestyle-testimonial').forEach(el => {
        observer.observe(el);
    });
    
    // Smooth reveal for sections
    document.querySelectorAll('.lifestyle-section').forEach(el => {
        observer.observe(el);
    });
});

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    .loaded {
        opacity: 1;
    }
    
    .lifestyle-feature-card,
    .lifestyle-pricing-card,
    .lifestyle-testimonial {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .lifestyle-feature-card.animate-in,
    .lifestyle-pricing-card.animate-in,
    .lifestyle-testimonial.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    .lifestyle-section {
        opacity: 0;
        transition: opacity 0.8s ease;
    }
    
    .lifestyle-section.animate-in {
        opacity: 1;
    }
`;
document.head.appendChild(style);
</script>

</body>
</html>