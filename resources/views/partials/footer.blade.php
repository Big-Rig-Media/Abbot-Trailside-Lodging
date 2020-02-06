@if( class_exists('ACF') )
  <footer class="py-10" role="contentinfo" aria-label="Footer">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      @switch( get_field('footer_component', 'option') )
        @case('footer-a')
          @include('partials.footers.footer-a')
        @break
        @case('footer-b')
          @include('partials.footers.footer-b')
        @break
        @case('footer-c')
          @include('partials.footers.footer-c')
        @break
        @default
          Nothing Yet
        @break
      @endswitch
    </div>
  </footer>
@endif
