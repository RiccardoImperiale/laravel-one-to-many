@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div id="{{ $project->id }}" class="post">
            <h2 class="title">{{ $project->title }}</h2>
            <div class="post_content d-flex">
                <img width="400" class="my-2 rounded" src="{{ asset("storage/$project->image") }}" alt="post image">
                <div class="ps-5 py-2 d-flex flex-column justify-content-between">
                    <div>
                        <h5>Type:</h5>
                        <p>{{ $project->type->name }}</p>
                        <h5>Description:</h5>
                        <p class="description">{{ $project->description }}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a class="btn btn-dark" target="_blank" href="{{ $project->live_link }}">Live Version</a>
                        <a class="btn btn-dark" target="_blank" href="{{ $project->code_link }}">Source Code</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script></script>
@endsection
