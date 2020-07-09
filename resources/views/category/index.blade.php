@extends('layouts.app')

@section('content')

    @foreach ($categories as $item)
        <a href="{{ route('category.id', ['id' => $item->id]) }}">{{ $item->name }}</a> <br>
    @endforeach

    {{-- TODO вынести пагинацию в компонент --}}
    <nav class="blog-pagination">
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        <a class="btn btn-outline-primary" href="#">Older</a>
    </nav>
@endsection