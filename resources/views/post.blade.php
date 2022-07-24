@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3 float-end">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Add New</a>
                    </div>

                    <table class="table table-light">
                        <thead>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>Post Title</td>
                                <td>Author</td>
                                <td>Published</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <a href="{{ route('admin.posts') }}/edit/{{ $post->id }}" class="btn btn-success">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection