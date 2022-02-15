@extends('layouts.admin')

@section('title')
    | Post - {{ $post->title }}
@endsection

@section('content')
    <div class="container">

        <h1>{{ $post->title }}</h1>

        @if ($post->category)
            <h4 class="d-inline-block mr-2">Categoria: {{ $post->category->name }}</h4>
        @endif

        @foreach ($post->tags as $tag)
            <span class="badge bg-primary mb-4">{{ $tag->name }}</span>
        @endforeach

        @if ($post->image)
            <img width="1000px" src="{{ asset('storage/' . $post->image) }}" alt="" class="d-block mb-3">
        @endif

        <p>{{ $post->content }}</p>

        <a href="{{ route('admin.posts.index') }}">Back Lista Post</a>

    </div>
@endsection
