{{--
  Template Name: Accessibility Template
--}}

@extends('layouts.app')

@section('content')
  <p>Accessibility Statement for <a href="{{ get_bloginfo('url', 'display') }}">{{ preg_replace('/^https?:\/\//', '', get_bloginfo('url', 'display')) }}</a></p>
  <p><strong>{{ get_bloginfo('name', 'display') }}</strong> is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone and applying the relevant accessibility standards.</p>
  <p><strong>Conformance status</strong><br>
  The Web Content Accessibility Guidelines (WCAG) defines guidelines for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. <a href="{{ get_bloginfo('url', 'display') }}">{{ preg_replace('/^https?:\/\//', '', get_bloginfo('url', 'display')) }}</a> is partially conformant with WCAG 2.1 level AA. Partially conformant means that some parts of the content do not fully conform to the accessibility standard. While WCAG is a set of guidelines rather than enforceable legislation, <strong>{{ get_bloginfo('name', 'display') }}</strong> uses every effort apply such recommendations to its web site to ensure equal access to all online users.</p>
  <p><strong>Feedback</strong><br>
  We welcome your feedback on the accessibility of <a href="{{ get_bloginfo('url', 'display') }}">{{ preg_replace('/^https?:\/\//', '', get_bloginfo('url', 'display')) }}</a>. Please let us know if you encounter accessibility barriers on <a href="{{ get_bloginfo('url', 'display') }}">{{ preg_replace('/^https?:\/\//', '', get_bloginfo('url', 'display')) }}</a>:</p>
  @if( $phone && $directions )
    <p>Phone: <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{ $phone }}</a><br>
    Visitor address: {{ $directions }}<br>
    We try to respond to feedback within thirty business days.</p>
  @endif
@endsection
