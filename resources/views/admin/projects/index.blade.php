@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="projects">
            @forelse ($projects as $project)
                <div id="{{ $project->id }}" class="project">
                    <div class="title">{{ $project->title }}</div>
                    <div class="project_content">
                        <img src="{{ $project->cover_image }}" alt="post image">
                        <p class="description">{{ $project->content }}</p>
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
