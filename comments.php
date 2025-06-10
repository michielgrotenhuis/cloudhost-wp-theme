<?php
/**
 * The comments template for CloudHost Pro theme
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area bg-white rounded-lg shadow-lg p-8 mt-8">
    
    <?php if (have_comments()) : ?>
        <h3 class="comments-title text-2xl font-bold text-gray-900 mb-6">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number == 1) {
                printf(esc_html__('One comment on "%s"', 'cloudhost-pro'), get_the_title());
            } else {
                printf(
                    esc_html(_nx('%1$s comment on "%2$s"', '%1$s comments on "%2$s"', $comments_number, 'comments title', 'cloudhost-pro')),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h3>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation mb-6" role="navigation">
                <h4 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'cloudhost-pro'); ?></h4>
                <div class="nav-links flex justify-between">
                    <?php
                    if ($prev_link = get_previous_comments_link(__('Older Comments', 'cloudhost-pro'))) {
                        printf('<div class="nav-previous">%s</div>', $prev_link);
                    }
                    if ($next_link = get_next_comments_link(__('Newer Comments', 'cloudhost-pro'))) {
                        printf('<div class="nav-next">%s</div>', $next_link);
                    }
                    ?>
                </div>
            </nav>
        <?php endif; ?>

        <ol class="comment-list space-y-6">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'cloudhost_comment_callback',
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation mt-6" role="navigation">
                <h4 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'cloudhost-pro'); ?></h4>
                <div class="nav-links flex justify-between">
                    <?php
                    if ($prev_link = get_previous_comments_link(__('Older Comments', 'cloudhost-pro'))) {
                        printf('<div class="nav-previous">%s</div>', $prev_link);
                    }
                    if ($next_link = get_next_comments_link(__('Newer Comments', 'cloudhost-pro'))) {
                        printf('<div class="nav-next">%s</div>', $next_link);
                    }
                    ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note.
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments text-gray-600 italic">
            <?php esc_html_e('Comments are closed.', 'cloudhost-pro'); ?>
        </p>
    <?php endif; ?>

    <?php
    // Comment form
    if (comments_open()) :
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : '');
        
        $comment_form_args = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'class_form'        => 'comment-form mt-8',
            'class_submit'      => 'bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-colors font-medium cursor-pointer',
            'name_submit'       => 'submit',
            'title_reply'       => '<h3 class="text-xl font-bold text-gray-900 mb-6">' . __('Leave a Comment', 'cloudhost-pro') . '</h3>',
            'title_reply_to'    => '<h3 class="text-xl font-bold text-gray-900 mb-6">' . __('Leave a Reply to %s', 'cloudhost-pro') . '</h3>',
            'cancel_reply_link' => '<span class="text-sm text-gray-600 hover:text-primary ml-4">' . __('Cancel Reply', 'cloudhost-pro') . '</span>',
            'label_submit'      => __('Post Comment', 'cloudhost-pro'),
            'submit_button'     => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
            'comment_field'     => '<div class="mb-4"><label for="comment" class="block text-sm font-medium text-gray-700 mb-2">' . _x('Comment', 'noun', 'cloudhost-pro') . ($req ? ' <span class="text-red-500">*</span>' : '') . '</label><textarea id="comment" name="comment" cols="45" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors" aria-required="true" placeholder="' . esc_attr__('Write your comment here...', 'cloudhost-pro') . '"></textarea></div>',
            'fields'            => array(
                'author' => '<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4"><div><label for="author" class="block text-sm font-medium text-gray-700 mb-2">' . __('Name', 'cloudhost-pro') . ($req ? ' <span class="text-red-500">*</span>' : '') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors"' . $aria_req . ' /></div>',
                'email'  => '<div><label for="email" class="block text-sm font-medium text-gray-700 mb-2">' . __('Email', 'cloudhost-pro') . ($req ? ' <span class="text-red-500">*</span>' : '') . '</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors"' . $aria_req . ' /></div></div>',
                'url'    => '<div class="mb-4"><label for="url" class="block text-sm font-medium text-gray-700 mb-2">' . __('Website', 'cloudhost-pro') . '</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors" /></div>',
            ),
            'comment_notes_before' => '<p class="text-sm text-gray-600 mb-4">' . __('Your email address will not be published.', 'cloudhost-pro') . ($req ? ' ' . __('Required fields are marked', 'cloudhost-pro') . ' <span class="text-red-500">*</span>' : '') . '</p>',
            'comment_notes_after'  => '',
        );
        
        comment_form($comment_form_args);
    endif;
    ?>

</div><!-- #comments -->