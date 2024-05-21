@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div id="{{ $project->id }}" class="post">
            <h2 class="title">{{ $project->title }}</h2>
            <div class="post_content d-flex">
                <img class="my-2 rounded" src="{{ $project->image }}" alt="post image">
                <div class="ps-5 py-2 d-flex flex-column justify-content-between">
                    <div>
                        <h5>Description:</h5>
                        <p class="description">{{ $project->description }}</p>
                        <div class="links">
                            <a href="{{ $project->live_link }}">Live Version</a>
                            <a href="{{ $project->code_link }}">Source Code</a>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a class="btn btn-secondary" href="{{ route('admin.projects.edit', $project) }}">Edit Post</a>

                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#delete_modal">
                            Delete
                        </button>

                        <!-- Modal Body -->
                        <div class="modal fade" id="delete_modal" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Delete <span class="fw-bold">{{ $project->title }}</span>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete this project?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
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
            </div>
        </div>
    </div>
    </div>
    <script></script>
@endsection
