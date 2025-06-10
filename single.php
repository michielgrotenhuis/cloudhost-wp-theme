<?php
/**
 * The single post template for CloudHost Pro theme
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
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-lg overflow-hidden'); ?>>
                        
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-64 md:h-80 object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Post Header -->
                        <header class="entry-header p-8 pb-4">
                            
                            <!-- Post Meta -->
                            <div class="post-meta flex flex-wrap items-center text-sm text-gray-500 mb-4 space-x-4">
                                <time class="published flex items-center" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                                
                                <span class="author flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="hover:text-primary transition-colors">
                                        <?php the_author(); ?>
                                    </a>
                                </span>
                                
                                <?php if (has_category()) : ?>
                                    <span class="categories flex items-center">
                                        <i class="fas fa-folder mr-2"></i>
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if (comments_open() || get_comments_number()) : ?>
                                    <span class="comments flex items-center">
                                        <i class="fas fa-comments mr-2"></i>
                                        <a href="#comments" class="hover:text-primary transition-colors">
                                            <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Post Title -->
                            <h1 class="entry-title text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                                <?php the_title(); ?>
                            </h1>
                            
                        </header>
                        
                        <!-- Post Content -->
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
                        
                        <!-- Post Footer -->
                        <footer class="entry-footer px-8 pb-8">
                            
                            <!-- Tags -->
                            <?php if (has_tag()) : ?>
                                <div class="post-tags mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                        <i class="fas fa-tags mr-2"></i>
                                        <?php esc_html_e('Tags:', 'cloudhost-pro'); ?>
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php
                                        $tags = get_the_tags();
                                        if ($tags) {
                                            foreach ($tags as $tag) {
                                                echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-primary hover:text-white transition-colors">' . esc_html($tag->name) . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Social Share Buttons -->
                            <div class="social-share mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-share-alt mr-2"></i>
                                    <?php esc_html_e('Share this post:', 'cloudhost-pro'); ?>
                                </h4>
                                <div class="flex space-x-3">
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                       target="_blank" 
                                       class="bg-blue-400 text-white p-2 rounded hover:bg-blue-500 transition-colors"
                                       aria-label="<?php esc_attr_e('Share on Twitter', 'cloudhost-pro'); ?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" 
                                       class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition-colors"
                                       aria-label="<?php esc_attr_e('Share on Facebook', 'cloudhost-pro'); ?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" 
                                       class="bg-blue-800 text-white p-2 rounded hover:bg-blue-900 transition-colors"
                                       aria-label="<?php esc_attr_e('Share on LinkedIn', 'cloudhost-pro'); ?>">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </footer>
                        
                    </article>

                    <!-- Author Bio -->
                    <?php if (get_the_author_meta('description')) : ?>
                        <div class="author-bio bg-white rounded-lg shadow-lg p-8 mt-8">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')); ?>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                        <?php esc_html_e('About', 'cloudhost-pro'); ?> <?php the_author(); ?>
                                    </h3>
                                    <div class="text-gray-600 mb-4">
                                        <?php echo wp_kses_post(get_the_author_meta('description')); ?>
                                    </div>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" 
                                       class="text-primary hover:text-secondary font-medium transition-colors">
                                        <?php esc_html_e('View all posts by', 'cloudhost-pro'); ?> <?php the_author(); ?>
                                        <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Related Posts -->
                    <?php
                    $related_posts = new WP_Query(array(
                        'category__in'   => wp_get_post_categories(get_the_ID()),
                        'post__not_in'   => array(get_the_ID()),
                        'posts_per_page' => 3,
                        'orderby'        => 'rand'
                    ));
                    
                    if ($related_posts->have_posts()) :
                    ?>
                        <div class="related-posts mt-12">
                            <h3 class="text-2xl font-bold text-gray-900 mb-8">
                                <?php esc_html_e('Related Posts', 'cloudhost-pro'); ?>
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <article class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="p-6">
                                            <h4 class="text-lg font-semibold mb-3">
                                                <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-primary transition-colors">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            
                                            <div class="text-sm text-gray-500 mb-3">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </div>
                                            
                                            <div class="text-gray-600 text-sm">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                            </div>
                                        </div>
                                    </article>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Post Navigation -->
                    <nav class="post-navigation mt-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="prev-post">
                                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" 
                                       class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                                        <div class="text-sm text-primary font-medium mb-2">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            <?php esc_html_e('Previous Post', 'cloudhost-pro'); ?>
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900">
                                            <?php echo esc_html(get_the_title($prev_post)); ?>
                                        </h4>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="next-post">
                                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>" 
                                       class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow text-right">
                                        <div class="text-sm text-primary font-medium mb-2">
                                            <?php esc_html_e('Next Post', 'cloudhost-pro'); ?>
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900">
                                            <?php echo esc_html(get_the_title($next_post)); ?>
                                        </h4>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </nav>

                    <!-- Comments -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        echo '<div class="comments-section mt-12">';
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
            </aside>
            
        </div>
    </div>
</main>

<?php
get_footer();
?>