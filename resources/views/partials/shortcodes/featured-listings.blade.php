@if( $posts )
  <div class="md:flex md:flex-row md:flex-wrap -mx-buffer brm-featured-listings js-listings">
    @foreach( $posts as $listing )
      @php
         // Define fields
         $price = get_field('listing_price', $listing->ID);
         $state = get_the_terms($listing, 'state');
         $city  = get_the_terms($listing, 'city');
      @endphp
      <div class="md:w-1/3 mb-10 md:mb-0 px-buffer brm-featured-listing">
        @if( App::image($listing->ID, 'w457x288') )
          <a class="block mb-5" href="{{ get_permalink($listing->ID) }}">
            <img src="{{ App::image($listing->ID, 'w457x288') }}" alt="{{ $listing->post_title }}" />
          </a>
        @endif
        <h4 class="mb-2">{{ $listing->post_title }}</h4>
        @if( $state && $city )
          <span class="block text-base">{{ $city[0]->name }}, {{ $state[0]->name }}</span>
        @endif
        @if( $price )
          <span class="block text-base"><strong>&#36;{{ $price }}</strong></span>
        @endif
      </div>
    @endforeach
  </div>
@endif
