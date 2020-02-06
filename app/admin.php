<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/*
 * Add custom page template column
 */
add_filter('manage_edit-page_columns', function($page_columns) {
    $page_columns['template'] = __('Page Template');

    return $page_columns;
});

/**
 * Populate custom page template column
 */
add_action('manage_page_posts_custom_column', function($column_name) {
    if ('template' !== $column_name) {
        return;
      }

      global $post;

      $template_name = get_page_template_slug($post->ID);
      $template = untrailingslashit(get_stylesheet_directory()) . '/' . $template_name;

      if (strlen(trim($template_name)) === 0 || !file_exists($template)) {
        $template_name = __('Default');
      } else {
        $template_name = get_file_description($template);
      }

      echo esc_html($template_name);
});

/**
 * Add custom registration date column
 */
add_filter('manage_users_columns', function($columns) {
    $columns['registration_date'] = 'Registration Date';

    return $columns;
});

/**
 * Populate custom registration date column
 */
add_filter('manage_users_custom_column', function($row_output, $column_id_attr, $user) {
    $date_format = 'm/d/Y g:i a';

    switch ( $column_id_attr ) {
      case 'registration_date':
        return date( $date_format, strtotime( get_the_author_meta( 'registered', $user ) ) );
      break;
    }

    return $row_output;
}, 10, 3);

/*
 * Disable page editor on templates with default content
 */
add_action('init', function() {
    if ( isset($_GET['post']) ) {
        switch ( get_post_meta($_GET['post'], '_wp_page_template', true) ) {
            case 'views/template-accessibility.blade.php':
            case 'views/template-privacy.blade.php':
                remove_post_type_support('page', 'editor');
            break;
        }
    }
});

/**
 * Custom login url
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/login_headerurl
 */
add_filter('login_headerurl', function() {
    return get_home_url();
});

/**
 * Customize admin logo url
 */
add_action('login_head', function() {
    if (in_array($GLOBALS['pagenow'], ['wp-login.php','wp-register.php'])) {
        wp_enqueue_style('sage/admin.css', get_stylesheet_directory_uri() . '/assets/styles/admin.css', false, null);
    }
});
