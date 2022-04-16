@extends('layouts.app')
@section('content')
<h1>Posts list</h1>
        <div class="card">
            <div class="card-header">
                <h3>Posts</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>body</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ substr($post->body, 100) . '...' }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="btn btn-outline-primary">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
