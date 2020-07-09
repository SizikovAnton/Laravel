@extends('layouts.app')

@section('content')
    @if (isset($feedbacks->name))
        <h3>{{ $feedbacks->name }}</h3>
        <p>{{ $feedbacks->comment }}</p>
        <p><i>{{ $feedbacks->created_at }}</i></p>
    @else
        @foreach ($feedbacks as $item)
            <h3><a href="{{ route('feedback.list', ['id' => $item->id]) }}">{{ $item->name }}</a></h3>
            <p>{{ $item->comment }}</p>
            <p><i>{{ $item->created_at }}</i></p>
            <hr>
        @endforeach
    @endif
@endsection