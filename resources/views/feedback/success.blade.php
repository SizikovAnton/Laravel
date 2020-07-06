@extends('layouts.app');

@section('content')
    <b>Comment saved!</b>
    <p><a href="{{ route('feedback.list') }}">Comment list</a></p>
@endsection