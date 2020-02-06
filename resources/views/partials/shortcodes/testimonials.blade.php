@if( $posts )
  <div class="text-center brm-testimonials js-testimonials">
    @foreach( $posts as $testimonial )
      <blockquote class="mb-10 brm-testimonial">
        {!! apply_filters('the_content', $testimonial->post_content) !!}
        <footer>
          <cite class="text-sm font-trade-gothic-lt-bold not-italic">&#8211; {{ $testimonial->post_title }}</cite>
        </footer>
      </blockquote>
    @endforeach
  </div>
@endif
