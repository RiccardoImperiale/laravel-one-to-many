@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div id="{{ $project->id }}" class="post">
            <h2 class="title">{{ $project->title }}</h2>
            <div class="post_content d-flex">
                <img class="my-2 rounded" src="{{ $project->cover_image }}" alt="post image">
                <div class="ps-5 py-2 d-flex flex-column justify-content-between">
                    <div>
                        <h5>Description:</h5>
                        <p class="description">{{ $project->content }}</p>
                    </div>
                    <div>
                        <a class="btn btn-secondary" href="{{ route('admin.projects.edit', $project) }}">Edit Post</a>
                        <form method="post" action="{{ route('admin.projects.destroy', $project) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark"
                                href="{{ route('admin.projects.destroy', $project) }}">Delete Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script></script>
@endsection
