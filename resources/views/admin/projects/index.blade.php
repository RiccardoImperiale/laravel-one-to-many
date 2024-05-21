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
        <div class="projects">
            @forelse ($projects as $project)
                <div id="{{ $project->id }}" class="project">
                    <div class="title">{{ $project->title }}</div>
                    <div class="project_content">
                        <img src="{{ $project->image }}" alt="post image">
                        <p class="description">{{ $project->description }}</p>
                    </div>
                    <a class="btn btn-danger" href="{{ route('admin.projects.show', $project) }}">Show Post</a>
                </div>
            @empty
                <p>Sorry, no projects to show...</p>
            @endforelse
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script>
        let projects = document.querySelectorAll('.project');
        projects.forEach(project => {
            project.addEventListener('click', function() {

                projects.forEach(p => {
                    p.classList.remove('open');
                    p.querySelector('.project_content').style.display = 'none';
                    p.querySelector('.btn').style.display = 'none';
                    p.querySelector('.title').style.display = 'block';
                });

                this.classList.toggle('open');

                if (this.classList.contains('open')) {
                    this.querySelector('.project_content').style.display = 'flex';
                    this.querySelector('.btn').style.display = 'block';
                    this.querySelector('.title').style.display = 'none';
                }
            });
        });
    </script>
@endsection
