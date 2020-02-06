{{--
  Title: Call to Action
  Description: Induce your users with a specific message.
  Category: common
  Icon: megaphone
  Keywords: call-to-action
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @php
    // Define fields
    $cta_wdt = get_field('call_to_action_width');
    $cta_spc = $cta_wdt !== 'full' ? 'md:px-10' : 'md:px-0';
  @endphp
  <section id="{{ $block['keywords'][0] }}" class="{{ $cta_wdt === 'full' ? 'w-full' : 'w-full max-w-10xl mx-auto' }} py-8 md:py-20 {{ $cta_spc }} brm-cta" style="background-color:{{ get_field('call_to_action_background_color') }}" role="region" aria-label="Call to Action">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      {!! get_field('call_to_action_content') !!}
    </div>
  </section>
@endif
