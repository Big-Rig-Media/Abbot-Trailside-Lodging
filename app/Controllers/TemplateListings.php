<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateListings extends Controller
{
    public function listings()
    {
        $query = new \WP_QUery([
            'post_type'      => 'listings',
            'posts_per_page' => 9,
            'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1,
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    public function listings_query()
    {
        $query = new \WP_QUery([
            'post_type'      => 'listings',
            'posts_per_page' => 9
        ]);

        if ( $query ) {
            return $query;
        }

        return;
    }
}
