@php global $wp_query @endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {!! apply_filters('the_content', __('Sorry, no results were found.')) !!}
    </div>
  @endif

  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile

  @if( $wp_query->max_num_pages > 1 )
    {!! App::pagination($wp_query) !!}
  @endif
@endsection
