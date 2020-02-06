@if( class_exists('ACF') )
  <header class="py-3 bg-white" role="banner" aria-label="Header">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      @switch( get_field('header_component', 'option') )
        @case('header-a')
          @include('partials.headers.header-a')
        @break
        @case('header-b')
          @include('partials.headers.header-b')
        @break
        @case('header-c')
          @include('partials.headers.header-c')
        @break
        @default
          Nothing Yet
        @break
      @endswitch
    </div>
  </header>
@endif
