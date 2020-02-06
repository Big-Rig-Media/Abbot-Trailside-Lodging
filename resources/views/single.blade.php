@extends('layouts.app')

@section('content')
  @php
    // Define the current query
    $query = get_queried_object();
  @endphp
  @while( have_posts() ) @php the_post() @endphp
    @switch( $query->post_type )
      @case('listings')
        @include('partials.listings-single')
      @break
      @default
        @include('partials.content-single-'.get_post_type())
      @break
    @endswitch
  @endwhile
@endsection
