@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {!! apply_filters('the_content', __('Sorry, but the page you were trying to view does not exist.')) !!}
    </div>
  @endif
@endsection
