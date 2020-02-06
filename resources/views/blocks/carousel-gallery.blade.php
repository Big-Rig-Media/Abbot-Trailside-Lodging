{{--
  Title: Carousel Gallery
  Description: Add a carousel gallery..
  Category: common
  Icon: images-alt
  Keywords: carousel
  Mode: edit
  Align: full
--}}

@if( class_exists('ACF') )
  @if( get_field('carousel_gallery') )
    <div class="mb-10">
      <div class="js-carousel-gallery">
        @foreach( get_field('carousel_gallery') as $gallery_item )
          <div>
            <a href="{{ $gallery_item['sizes']['large'] }}" data-fancybox>
              <img src="{{ $gallery_item['sizes']['w960x600'] }}" />
            </a>
          </div>
        @endforeach
      </div>
      <div class="mt-2 js-carousel-thumbs">
        @foreach( get_field('carousel_gallery') as $gallery_item )
          <div>
            <img class="mx-auto px-1" src="{{ $gallery_item['sizes']['w182x114'] }}" />
          </div>
        @endforeach
      </div>
    </div>
  @endif
@endif

