@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    @foreach ($news as $item)
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $item->title }}</h2>

            {!! $item->description !!}
            <p><a href="{{ route('news.id', ['id' => $item->id]) }}">Read more...</a></p>
        </div>
        <hr>
    @endforeach    
@endsection