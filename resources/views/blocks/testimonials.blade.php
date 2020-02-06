{{--
  Title: Testimonials
  Description: Add a testimonials carousel
  Category: common
  Icon: format-quote
  Keywords: testimonials
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @php
    // Define fields
    $testimonials_wdt = get_field('testimonial_width');
    $testimonials_mbl = get_field('testimonial_background_image')['sizes']['w960x562'] ?: '';
    $testimonials_dsk = get_field('testimonial_background_image')['sizes']['w1920x562'] ?: '';
    $testimonials_cnt = get_field('testimonial_content');
    $testimonials_spc = $testimonials_wdt !== 'full' ? 'md:px-10' : 'md:px-0';
  @endphp
  <section id="{{ $block['keywords'][0] }}" class="{{ $testimonials_wdt === 'full' ? 'w-full' : 'w-full max-w-10xl mx-auto' }} py-8 md:py-24 {{ $testimonials_spc }} text-white bg-center bg-cover bg-no-repeat brm-testimonials" data-mobile="{{ $testimonials_mbl }}" data-desktop="{{ $testimonials_dsk }}" style="background-image:url({{ $testimonials_dsk }})" role="region" aria-label="Testimonials">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      @if( $testimonials_cnt )
        {!! apply_filters('the_content', $testimonials_cnt) !!}
      @endif
      {!! do_shortcode('[testimonials]') !!}
    </div>
  </section>
@endif

