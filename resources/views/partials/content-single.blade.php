<article {{ post_class() }}>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div>
    {!! the_content() !!}
  </div>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
