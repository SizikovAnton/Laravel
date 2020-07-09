@extends('layouts.app')

@section('content')

    @foreach ($news as $item)
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $item->title }}</h2>

            {!! $item->description !!}
            
            <p><a href="{{ route('news.id', ['id' => $item->id]) }}">Read more...</a></p>
        </div>
    @endforeach

    <nav class="blog-pagination">
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        <a class="btn btn-outline-primary" href="#">Older</a>
    </nav>
@endsection