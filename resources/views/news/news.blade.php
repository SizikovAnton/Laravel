@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>

    <p>{{ $news->content }}</p>
@endsection

