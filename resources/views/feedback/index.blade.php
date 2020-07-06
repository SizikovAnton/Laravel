@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea type="text" class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection