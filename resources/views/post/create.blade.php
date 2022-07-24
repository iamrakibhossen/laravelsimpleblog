@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Posts Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3 float-end">
                        <a href="{{ route('admin.posts') }}" class="btn btn-primary">Back to Posts</a>
                    </div>

                    <div class="clearfix"></div>

                    <form method="post" action="{{ route('admin.post.create') }}">

                        @csrf

                        <div class="form-group mb-4">
                            <label for="title">Post Title</label>
                            <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group mb-4">
                            <label for="body">Post Body</label>
                            <textarea id="body" class="form-control" rows="5" name="body">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection