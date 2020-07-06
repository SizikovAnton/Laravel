@extends('layouts.app')

@section('content')
    @if (isset($feedbacks['name']))
        <h3>{{ $feedbacks['name'] }}</h3>
        <p>{{ $feedbacks['comment'] }}</p>
    @else
        @foreach ($feedbacks as $key=>$item)
            <h3><a href="{{ route('feedback.list', ['id' => $key]) }}">{{ $item['name'] }}</a></h3>
            <p>{{ $item['comment'] }}</p>
        @endforeach
    @endif
@endsection