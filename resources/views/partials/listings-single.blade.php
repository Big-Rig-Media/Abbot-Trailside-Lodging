<div class="md:flex md:flex-row md:flex-no-wrap md:items-start md:justify-between md:relative -mx-buffer">
  <div class="md:w-2/3 px-buffer">
    @php
      $address = get_field('listing_address');
      $price = get_field('listing_price');
    @endphp
    <h1 class="mb-0">{{ the_title() }}</h1>
    @if( $address )
      <h5 class="mb-10">{{ $address }}</h5>
    @endif
    @if( $price )
      <h4 class="mb-5">&#36;{{ $price }}</h4>
    @endif
    {!! the_content() !!}
  </div>
  <aside class="md:sticky md:top-sticky md:w-1/3 mt-10 md:mt-0 px-buffer">
    <div class="bg-gray-100 p-5 md:p-10">
      <h5 class="mb-0">Contact Our Sales Office</h5>
      @if( $phone )
        <a class="block mb-5 text-3xl text-primary-1" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{ $phone }}</a>
      @endif
      {!! do_shortcode('[gravityform id="5" title="false" description="false"]') !!}
    </div>
  </aside>
</div>
