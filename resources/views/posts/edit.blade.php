@extends('layouts.app')
@section('title') Edit  Post @endsection('title')
@section('content')

    <form method="POST" action="{{route('posts.update', $post->id)}}">
        @csrf
{{--   @method('PUT') required if we want to update an item, because form element accepts only: GET || POST     --}}
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">New Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">New Description</label>
            <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">New Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                <option value="{{$user -> id}}">{{$user -> name}}</option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection('content')
