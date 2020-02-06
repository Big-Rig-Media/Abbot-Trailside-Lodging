{{--
  Title: Featured Listings
  Description: Display a specified number of featured listings.
  Category: common
  Icon: star-filled
  Keywords: featured-listings
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  <section id="{{ $block['keywords'][0] }}" class="py-8 md:py-16 bg-white" role="region" aria-label="Featured Listings">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      @php
        // Define fields
        $listings_cnt = get_field('listings_content');
        $listings_lmt = (int) get_field('listings_limit');
      @endphp
      <div class="md:flex md:flex-row md:flex-no-wrap md:items-center md:justify-between mb-10">
        @if( $listings_cnt )
          {!! apply_filters('the_content', $listings_cnt) !!}
        @endif
        <a class="button button--primary" href="{{ get_permalink(50) }}">View Listings</a>
      </div>
      {!! do_shortcode('[featured-listings]') !!}
    </div>
  </section>
@endif
