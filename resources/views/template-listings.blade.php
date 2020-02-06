{{--
  Template Name: Listings Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @if( $listings )
    @include('partials.shortcodes.listings', ['posts' => $listings])

    @if( $listings_query->max_num_pages > 1 )
      {!! App::pagination($listings_query) !!}
    @endif
  @endif
@endsection
