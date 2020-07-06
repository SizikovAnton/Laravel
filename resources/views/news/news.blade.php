@extends('layouts.app')

@section('content')
    <h1>{{ $news['name'] }}</h1>

    <p>{{ $news['content'] }}</p>
@endsection

