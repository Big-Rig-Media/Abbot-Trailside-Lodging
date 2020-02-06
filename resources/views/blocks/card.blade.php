{{--
  Title: Card
  Description:
  Category: common
  Icon: image-flip-horizontal
  Keywords: cards
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @php
    // Define fields
    $card_mbl = get_field('card_image')['sizes']['w720x594'] ?: App\asset_path('images/placeholders/720x594.png');
    $card_dsk = get_field('card_image')['sizes']['w720x594'] ?: App\asset_path('images/placeholders/720x594.png');
    $card_cnt = get_field('card_content') ?: 'Your Card Content';
    $card_ord = get_field('card_order') === 'default' ? 'flex-col md:flex-row' : 'flex-col-reverse md:flex-row-reverse';
    $card_clr = get_field('card_background_color') ?: 'white';
  @endphp
  <section class="py-8">
    <div class="w-full max-w-10xl mx-auto px-buffer">
      <div class="flex {{ $card_ord }} md:flex-no-wrap md:items-center md:justify-between w-full brm-card">
        <div class="w-full md:w-1/2 md:p-8 bg-{{ $card_clr }} card-content">{!! $card_cnt !!}</div>
        <div class="w-full md:w-1/2 py-32 mt-8 md:mt-0 md:py-64 bg-center bg-no-repeat bg-cover card-image js-card" data-mobile="{{ $card_mbl }}" data-desktop="{{ $card_dsk }}" style="background-image:url({{ $card_dsk }})"></div>
      </div>
    </div>
  </section>
@endif
