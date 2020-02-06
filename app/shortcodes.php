<?php

namespace App;

add_shortcode('testimonials', function( $atts ) {
    extract(shortcode_atts([
        'limit' => 4,
    ], $atts));

    $query = new \WP_Query([
        'post_type'      => 'testimonials',
        'posts_per_page' => !is_admin() ? (int) $limit : 1
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.testimonials', ['posts' => $query->posts]);
    }

    return;
});

add_shortcode('featured-listings', function( $atts ) {
    extract(shortcode_atts([
        'limit' => 3,
    ], $atts));

    $query = new \WP_Query([
        'post_type'      => 'listings',
        'posts_per_page' => (int) $limit,
        'tax_query'      => [
            [
                'taxonomy' => 'featured',
                'field'    => 'slug',
                'terms'    => 'yes'
            ]
        ],
        'no_found_rows' => true
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.featured-listings', ['posts' => $query->posts]);
    }

    return;
});

add_shortcode('row', function( $atts, $content = null ) {
    return '<div class="flex -mx-buffer">'.do_shortcode($content).'</div>';
});

add_shortcode('column', function( $atts, $content = null ) {
    extract(shortcode_atts([
        'width' => '1/2',
    ], $atts));

    return '<div class="w-full md:w-'.$width.' px-buffer">'.do_shortcode($content).'</div>';
});
