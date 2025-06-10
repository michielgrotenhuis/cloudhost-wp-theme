<?php
/**
 * The page template for CloudHost Pro theme
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="page-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-lg overflow-hidden'); ?>>
                        
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-64 md:h-80 object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Page Header -->
                        <header class="entry-header p-8 pb-6">
                            <h1 class="entry-title text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                                <?php the_title(); ?>
                            </h1>
                            
                            <?php if (get_the_excerpt()) : ?>
                                <div class="page-excerpt text-xl text-gray-600 mt-4">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <!-- Page Content -->
                        <div class="entry-content px-8 pb-8">
                            <div class="prose prose-lg max-w-none">
                                <?php
                                the_content();
                                
                                wp_link_pages(array(
                                    'before' => '<div class="page-links flex items-center space-x-2 mt-8 pt-8 border-t border-gray-200">',
                                    'after'  => '</div>',
                                    'link_before' => '<span class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-secondary transition-colors">',
                                    'link_after'  => '</span>',
                                ));
                                ?>
                            </div>
                        </div>
                        
                    </article>

                    <!-- Comments (if enabled for pages) -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        echo '<div class="comments-section mt-8">';
                        comments_template();
                        echo '</div>';
                    }
                    ?>

                <?php endwhile; ?>
            </div>

            <!-- Sidebar -->
            <aside id="secondary" class="widget-area sidebar">
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                <?php else : ?>
                    
                    <!-- Contact Widget -->
                    <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                            <?php esc_html_e('Need Help?', 'cloudhost-pro'); ?>
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            <?php esc_html_e('Our support team is here to help you with any questions.', 'cloudhost-pro'); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" 
                           class="bg-primary text-white px-4 py-2 rounded text-sm font-medium hover:bg-secondary transition-colors inline-block">
                            <?php esc_html_e('Contact Support', 'cloudhost-pro'); ?>
                        </a>
                    </div>
                    
                    <!-- Navigation Widget -->
                    <?php if (wp_list_pages(array('child_of' => get_the_ID(), 'echo' => false))) : ?>
                        <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                            <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                                <?php esc_html_e('Subpages', 'cloudhost-pro'); ?>
                            </h3>
                            <ul class="space-y-2">
                                <?php
                                wp_list_pages(array(
                                    'child_of' => get_the_ID(),
                                    'title_li' => '',
                                    'link_before' => '<span class="text-gray-700 hover:text-primary transition-colors text-sm">',
                                    'link_after' => '</span>',
                                ));
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Recent Posts Widget -->
                    <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                            <?php esc_html_e('Latest News', 'cloudhost-pro'); ?>
                        </h3>
                        <ul class="space-y-3">
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 3,
                                'post_status' => 'publish'
                            ));
                            
                            foreach ($recent_posts as $post) :
                            ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($post['ID'])); ?>" 
                                       class="text-gray-700 hover:text-primary transition-colors text-sm">
                                        <?php echo esc_html($post['post_title']); ?>
                                    </a>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <?php echo esc_html(get_the_date('M j, Y', $post['ID'])); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="mt-4">
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" 
                               class="text-primary hover:text-secondary text-sm font-medium">
                                <?php esc_html_e('View All Posts', 'cloudhost-pro'); ?> →
                            </a>
                        </div>
                    </div>
                    
                    <!-- CTA Widget -->
                    <div class="widget bg-gradient-to-r from-primary to-secondary rounded-lg shadow-md p-6 mb-6 text-white">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-white">
                            <?php esc_html_e('Ready to Get Started?', 'cloudhost-pro'); ?>
                        </h3>
                        <p class="text-sm mb-4 text-blue-100">
                            <?php esc_html_e('Join thousands of customers who trust our hosting solutions.', 'cloudhost-pro'); ?>
                        </p>
                        <a href="<?php echo esc_url(get_theme_mod('cloudhost_hero_button_url', '#')); ?>" 
                           class="bg-white text-primary px-4 py-2 rounded text-sm font-medium hover:bg-gray-100 transition-colors inline-block">
                            <?php esc_html_e('Start Free Trial', 'cloudhost-pro'); ?>
                        </a>
                    </div>
                    
                <?php endif; ?>
            </aside>
            
        </div>
    </div>
</main>

<?php
get_footer();
?>