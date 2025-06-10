<?php
/**
 * Custom search form for CloudHost Pro theme
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field-<?php echo esc_attr(uniqid()); ?>" class="screen-reader-text">
        <?php esc_html_e('Search for:', 'cloudhost-pro'); ?>
    </label>
    
    <div class="search-form-wrapper flex gap-2">
        <input type="search" 
               id="search-field-<?php echo esc_attr(uniqid()); ?>"
               class="search-field flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors" 
               placeholder="<?php esc_attr_e('Search...', 'cloudhost-pro'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" />
        
        <button type="submit" 
                class="search-submit bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors">
            <i class="fas fa-search" aria-hidden="true"></i>
            <span class="sr-only"><?php esc_html_e('Search', 'cloudhost-pro'); ?></span>
        </button>
    </div>
</form>