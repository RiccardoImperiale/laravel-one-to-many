@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div id="{{ $post->id }}" class="post">
            <h2 class="title">{{ $post->title }}</h2>
            <div class="post_content d-flex">
                <img class="my-2 rounded" src="{{ $post->cover_image }}" alt="post image">
                <div class="ps-5 py-2 d-flex flex-column justify-content-between">
                    <div>
                        <h5>Description:</h5>
                        <p class="description">{{ $post->content }}</p>
                    </div>
                    <div>
                        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post) }}">Edit Post</a>
                        <a class="btn btn-dark" href="{{ route('admin.posts.destroy', $post) }}">Delete Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script></script>
@endsection
