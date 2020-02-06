<?php

namespace App;

/**
 * Modify Allowed Media Mime Types
 */
add_filter('upload_mimes', function( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});

/**
 * Custom image sizes
 *
 * @link    https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * e.g. add_image_size('w800x400', 800, 400, true)
 */

$custom_sizes = [
    'w1920x848' => [1920, 848, true],
    'w1920x562' => [1920, 562, true],
    'w960x848'  => [960, 848, true],
    'w960x600'  => [960, 600, true],
    'w960x562'  => [960, 562, true],
    'w720x594'  => [720, 594, true],
    'w460x460'  => [460, 460, true],
    'w457x288'  => [457, 288, true],
    'w182x114'  => [182, 114, true]
];

if ( !empty($custom_sizes) ) {
    foreach ( $custom_sizes as $key => $custom_size ) {
        add_image_size($key, $custom_size[0], $custom_size[1], $custom_size[2]);
    }
}
