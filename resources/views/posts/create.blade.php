@extends('layouts.app')
@section('title') Create  Post @endsection('title')
@section('content')

    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Creator</label>
            <select name="post_creator" class="form-control">
                <option value="1">Ahmed</option>
                <option value="2">Mohammed</option>
            </select>
        </div>

        <button class="btn btn-success">Submit</button>
    </form>
@endsection('content')
