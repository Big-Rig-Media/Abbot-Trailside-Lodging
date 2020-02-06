<?php

namespace App;

/**
 * Register the required plugins for Xpress.
 */
add_action('tgmpa_register', function() {
    $plugins =  [
        [
            'name'      => 'Autoptimize',
            'slug'      => 'autoptimize',
            'required'  => true
        ],
        [
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'required'  => true
        ],
        [
            'name'      => 'Google Analytics Dashboard Plugin for WordPress by MonsterInsights',
            'slug'      => 'google-analytics-for-wordpress',
            'required'  => false
        ],
        [
            'name'      => 'Imsanity',
            'slug'      => 'imsanity',
            'required'  => true
        ],
        [
            'name'      => 'Stream',
            'slug'      => 'stream',
            'required'  => true
        ],
        [
            'name'      => 'Wordfence',
            'slug'      => 'wordfence',
            'required'  => true
        ],
        [
            'name'      => 'The SEO Framework',
            'slug'      => 'autodescription',
            'required'  => false
        ],
        [
            'name'      => 'WP Optimize',
            'slug'      => 'wp-optimize',
            'required'  => true
        ],
        [
            'name'      => 'WPS Hide',
            'slug'      => 'wps-hide-login',
            'required'  => true
        ]
    ];

    tgmpa( $plugins );
});
