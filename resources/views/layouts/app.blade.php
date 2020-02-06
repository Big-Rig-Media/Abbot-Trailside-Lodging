<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bg-gray-100') @endphp>
    @if( $tag_manager )
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-{!! $tag_manager !!}"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    @endif
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main class="bg-bottom bg-no-repeat bg-contain" style="background-image:url(@asset('images/bg-main.png'))" role="document" aria-label="Content">
      @if(App\display_layout())
        <section class="py-8 md:py-20" role="region" aria-label="Default Content">
          <div class="w-full max-w-10xl mx-auto px-buffer">
            @yield('content')
          </div>
        </section>
      @else
        @yield('content')
      @endif
    </main>
    @include('partials.static.call-to-action')
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
