<?php

namespace App;

/**
 *  Create custom post type and taxonomies
 *
 * @link    https://codex.wordpress.org/Function_Reference/register_post_type
 * @link    https://codex.wordpress.org/Function_Reference/register_taxonomy
 * @since   1.0.0
 */
add_action('init', function() {
    add_rewrite_rule( '(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top' );

    // Create custom post types
    register_post_type('listings', [
        'label'                 => 'Listings',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'listings', 'with_front' => false],
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M570.24 215.42l-58.35-47.95V72a8 8 0 00-8-8h-32a8 8 0 00-7.89 7.71v56.41L323.87 13a56 56 0 00-71.74 0L5.76 215.42a16 16 0 00-2 22.54L14 250.26a16 16 0 0022.53 2L64 229.71V288h-.31v208a16.13 16.13 0 0016.1 16H496a16 16 0 0016-16V229.71l27.5 22.59a16 16 0 0022.53-2l10.26-12.3a16 16 0 00-2.05-22.58zM464 224h-.21v240H352V320a32 32 0 00-32-32h-64a32 32 0 00-32 32v144H111.69V194.48l.31-.25v-4L288 45.65l176 144.62z"/></svg>'),
        'supports'              => ['editor', 'title'],
        'show_in_rest'          => true
    ]);

    register_post_type('testimonials', [
        'label'                 => 'Testimonials',
        'public'                => false,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'testimonials', 'with_front' => false],
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M544 184.88V32.01C544 23.26 537.02 0 512.01 0H512c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64l-.48 32c0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h106.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13c19.05-11.09 32-31.49 32-55.12.01-23.64-12.94-44.04-31.99-55.13zM127.73 464c-10.76-25.45-16.21-52.31-16.21-80 0-14.22 1.72-25.34 2.6-32h64.91c-2.09 10.7-3.52 21.41-3.52 32 0 28.22 6.58 55.4 19.21 80h-66.99zM240 304H64c-8.82 0-16-7.18-16-16v-96c0-8.82 7.18-16 16-16h176v128zm256 110.7l-59.04-47.24c-42.8-34.22-94.79-55.37-148.96-61.45V173.99c54.17-6.08 106.16-27.23 148.97-61.46L496 65.3v349.4z"/></svg>'),
        'supports'              => ['editor', 'title']
    ]);

    // Set taxonomies
    $taxonomies = [
        'City' => [
            'public'        => false,
            'label'         => 'City',
            'url'           => 'city',
            'hierarchical'  => true,
            'parent'        => 'listings'
        ],
        'Featured' => [
            'public'        => false,
            'label'         => 'Featured',
            'url'           => 'featured',
            'hierarchical'  => true,
            'parent'        => 'listings'
        ],
        'State' => [
            'public'        => false,
            'label'         => 'State',
            'url'           => 'state',
            'hierarchical'  => true,
            'parent'        => 'listings'
        ],
    ];

    if ( !empty($taxonomies) ) {
        foreach ( $taxonomies as $key => $taxonomy ) {
            // Taxonomy variables
            $taxonomy_string    = str_replace(' ', '_', strtolower($key));
            $label              = ucwords($taxonomy['label']);
            $rewrite_url        = $taxonomy['url'];
            $public             = $taxonomy['public'];
            $hierarchical       = $taxonomy['hierarchical'];
            $parent             = $taxonomy['parent'];

            register_taxonomy(
                $taxonomy_string,
                $parent,
                [
                  'label'         => $label,
                  'public'        => $public,
                  'show_ui'       => true,
                  'rewrite'       => ['slug' => $rewrite_url, 'with_front' => false],
                  'hierarchical'  => $hierarchical
                ]
            );
        }

        // Pre-populate featured taxonomy
        $terms = ['yes', 'no'];

        foreach ( $terms as $term ) {
            $check_term = term_exists($term);

            if ( !$check_term ) {
                wp_insert_term(ucfirst($term), 'featured');
            }
        }
    }
});

/**
 * Add some custom columns to listings custom post type
 *
 * @since   1.0.0
 * @link    https://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 */
add_filter('manage_edit-listings_columns', function( $columns ) {
    $columns = [
        'cb'        => '<input type="checkbox" />',
        'title'     => __('Title'),
        'city'	    => __('City'),
        'featured'  => __('Featured'),
        'state'	    => __('State'),
        'date'	    => __('Date')
      ];

      return $columns;
});

/**
 * Insert data into listings custom post type columns
 *
 * @since   1.0.0
 * @link    https://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 */
add_action('manage_listings_posts_custom_column', function( $column_name, $id ) {
    $output = [];

    switch ( $column_name ) {
        case 'city':
            $terms = get_the_terms($id, 'city');

            if ( $terms ) {
                foreach ( $terms as $term ) {
                    $output[] = $term->name;
                }
            }
        break;
        case 'featured':
            $terms = get_the_terms($id, 'featured');

            if ( $terms ) {
                foreach ( $terms as $term ) {
                    $output[] = $term->name;
                }
            }
        break;
        case 'state':
            $terms = get_the_terms($id, 'state');

            if ( $terms ) {
                foreach ( $terms as $term ) {
                    $output[] = $term->name;
                }
            }
        break;
    }

    echo join(', ', $output);
}, 10, 2);
