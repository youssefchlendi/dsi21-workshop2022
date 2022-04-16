@extends('layouts.app')
@section('content')
<h1>Posts list</h1>
<div class="card mb-3">
    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }} <span class="badge bg-primary">{{ $post->category->name }}</span>  </h5>
        <p class="card-text">{{ $post->body }}</p>
        <p class="card-text">Author: {{ $post->user->name }}</p>
        <p class="card-text"><small class="text-muted">{{ $post->updated_at }}</small></p>
    </div>
</div>
@endsection
