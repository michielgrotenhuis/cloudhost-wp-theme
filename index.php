<?php
/**
 * The main template file for CloudHost Pro theme
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content Area -->
            <div class="lg:col-span-2">
                <?php if (have_posts()) : ?>
                    
                    <!-- Page Header -->
                    <header class="page-header mb-8">
                        <?php if (is_home() && !is_front_page()) : ?>
                            <h1 class="page-title text-4xl font-bold text-gray-900 mb-4">
                                <?php esc_html_e('Latest Posts', 'cloudhost-pro'); ?>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <?php esc_html_e('Stay updated with our latest news and insights.', 'cloudhost-pro'); ?>
                            </p>
                        <?php elseif (is_archive()) : ?>
                            <h1 class="page-title text-4xl font-bold text-gray-900 mb-4">
                                <?php the_archive_title(); ?>
                            </h1>
                            <?php if (get_the_archive_description()) : ?>
                                <div class="archive-description text-gray-600 text-lg">
                                    <?php the_archive_description(); ?>
                                </div>
                            <?php endif; ?>
                        <?php elseif (is_search()) : ?>
                            <h1 class="page-title text-4xl font-bold text-gray-900 mb-4">
                                <?php
                                printf(
                                    esc_html__('Search Results for: %s', 'cloudhost-pro'),
                                    '<span class="text-primary">' . get_search_query() . '</span>'
                                );
                                ?>
                            </h1>
                        <?php endif; ?>
                    </header>

                    <!-- Posts Loop -->
                    <div class="posts-container space-y-8">
                        <?php while (have_posts()) : the_post(); ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card-hover'); ?>>
                                
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail mb-6">
                                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-t-lg">
                                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover hover:scale-105 transition-transform duration-300')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Post Content -->
                                <div class="post-content p-6">
                                    
                                    <!-- Post Meta -->
                                    <div class="post-meta flex items-center text-sm text-gray-500 mb-3">
                                        <time class="published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                        
                                        <span class="mx-2">•</span>
                                        
                                        <span class="author">
                                            <i class="fas fa-user mr-1"></i>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="hover:text-primary transition-colors">
                                                <?php the_author(); ?>
                                            </a>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="mx-2">•</span>
                                            <span class="categories">
                                                <i class="fas fa-folder mr-1"></i>
                                                <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Post Title -->
                                    <h2 class="post-title text-2xl font-bold mb-4">
                                        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-primary transition-colors">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt text-gray-600 mb-4">
                                        <?php
                                        if (has_excerpt()) {
                                            the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 30, '...');
                                        }
                                        ?>
                                    </div>
                                    
                                    <!-- Read More Button -->
                                    <div class="post-footer">
                                        <a href="<?php the_permalink(); ?>" 
                                           class="inline-flex items-center text-primary hover:text-secondary font-medium transition-colors">
                                            <?php esc_html_e('Read More', 'cloudhost-pro'); ?>
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                            </article>
                            
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <?php cloudhost_pagination(); ?>

                <?php else : ?>
                    
                    <!-- No Posts Found -->
                    <div class="no-posts-found bg-white rounded-lg shadow-md p-8 text-center">
                        <div class="max-w-md mx-auto">
                            <i class="fas fa-search text-6xl text-gray-300 mb-6"></i>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                <?php esc_html_e('Nothing Found', 'cloudhost-pro'); ?>
                            </h2>
                            
                            <?php if (is_search()) : ?>
                                <p class="text-gray-600 mb-6">
                                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cloudhost-pro'); ?>
                                </p>
                                <?php get_search_form(); ?>
                            <?php else : ?>
                                <p class="text-gray-600 mb-6">
                                    <?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'cloudhost-pro'); ?>
                                </p>
                                <?php get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside id="secondary" class="widget-area sidebar">
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                <?php else : ?>
                    
                    <!-- Default Sidebar Content -->
                    
                    <!-- Search Widget -->
                    <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                            <?php esc_html_e('Search', 'cloudhost-pro'); ?>
                        </h3>
                        <?php get_search_form(); ?>
                    </div>
                    
                    <!-- Recent Posts Widget -->
                    <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                            <?php esc_html_e('Recent Posts', 'cloudhost-pro'); ?>
                        </h3>
                        <ul class="space-y-3">
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 5,
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
                    </div>
                    
                    <!-- Categories Widget -->
                    <?php if (have_posts()) : ?>
                        <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                            <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                                <?php esc_html_e('Categories', 'cloudhost-pro'); ?>
                            </h3>
                            <ul class="space-y-2">
                                <?php
                                wp_list_categories(array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => true,
                                    'title_li'   => '',
                                    'number'     => 10,
                                ));
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Archives Widget -->
                    <div class="widget bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-gray-900">
                            <?php esc_html_e('Archives', 'cloudhost-pro'); ?>
                        </h3>
                        <ul class="space-y-2">
                            <?php
                            wp_get_archives(array(
                                'type'            => 'monthly',
                                'limit'           => 12,
                                'format'          => 'html',
                                'before'          => '',
                                'after'           => '',
                                'show_post_count' => true,
                            ));
                            ?>
                        </ul>
                    </div>
                    
                    <!-- Call to Action Widget -->
                    <div class="widget bg-gradient-to-r from-primary to-secondary rounded-lg shadow-md p-6 mb-6 text-white">
                        <h3 class="widget-title text-lg font-semibold mb-4 text-white">
                            <?php esc_html_e('Need Hosting?', 'cloudhost-pro'); ?>
                        </h3>
                        <p class="text-sm mb-4 text-blue-100">
                            <?php esc_html_e('Get started with our premium hosting solutions today!', 'cloudhost-pro'); ?>
                        </p>
                        <a href="<?php echo esc_url(get_theme_mod('cloudhost_hero_button_url', '#')); ?>" 
                           class="bg-white text-primary px-4 py-2 rounded text-sm font-medium hover:bg-gray-100 transition-colors inline-block">
                            <?php esc_html_e('Get Started', 'cloudhost-pro'); ?>
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