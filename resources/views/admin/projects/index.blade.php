@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-center">All Projects</h2>
            <a class="btn btn-primary h-100" href="{{ route('admin.projects.create') }}">
                Add New Project
            </a>
        </div>
    </header>
    <div class="container">
        @include('partials.session-messages')
        <div class="mt-4">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title</th>
                        <th scope="col">type</th>
                        <th scope="col">image</th>
                        <th class="text-end" scope="col">actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->type?->name ?? 'no type' }}</td>
                            <td>
                                @if (Str::startsWith($project->image, 'uploads/'))
                                    <div class="image_container">
                                        <img src="{{ asset("storage/$project->image") }}" alt="{{ $project->title }}">
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-end gap-1">
                                    <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}">
                                        <span style="font-size: 0.7rem" class="text-uppercase">View</span>
                                    </a>
                                    <a class="btn btn-dark" href="{{ route('admin.projects.edit', $project) }}">
                                        <span style="font-size: 0.7rem" class="text-uppercase">Edit</span>
                                    </a>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $project->id }}">
                                        <span style="font-size: 0.7rem" class="text-uppercase">Delete</span>
                                    </button>

                                    <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                        Delete project
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this project:
                                                    {{ $project->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            Confirm
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>Sorry, no projects to show...</p>
                    @endforelse
                </tbody>
            </table>

            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
