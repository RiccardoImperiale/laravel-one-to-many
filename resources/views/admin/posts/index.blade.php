@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="posts">
            @forelse ($posts as $post)
                <div id="{{ $post->id }}" class="post">
                    <div class="title">{{ $post->title }}</div>
                    <div class="post_content">
                        <img src="{{ $post->cover_image }}" alt="post image">
                        <p class="description">{{ $post->content }}</p>
                    </div>
                    <a class="btn btn-danger" href="{{ route('admin.posts.show', $post) }}">Show Post</a>
                </div>
            @empty
                <p>Sorry, no posts to show...</p>
            @endforelse
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script>
        let posts = document.querySelectorAll('.post');
        posts.forEach(post => {
            post.addEventListener('click', function() {

                posts.forEach(p => {
                    p.classList.remove('open');
                    p.querySelector('.post_content').style.display = 'none';
                    p.querySelector('.btn').style.display = 'none';
                    p.querySelector('.title').style.display = 'block';
                });

                this.classList.toggle('open');

                if (this.classList.contains('open')) {
                    this.querySelector('.post_content').style.display = 'flex';
                    this.querySelector('.btn').style.display = 'block';
                    this.querySelector('.title').style.display = 'none';
                }
            });
        });
    </script>
@endsection
