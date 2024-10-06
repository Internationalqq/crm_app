@extends('layouts.main')
@section('content')
    <div>
        {{-- <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3 px-4">Create</a>
        </div>
        @foreach ($posts as $post)
            <p><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></p>
        @endforeach

        <div class="mt-5">
            {{ $posts->withQueryString()->links() }}
        </div> --}}
        <h1>Sales</h1>
    </div>
@endsection
