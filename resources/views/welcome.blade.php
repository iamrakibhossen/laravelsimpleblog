@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post Lists') }}</div>

                <div class="card-body">

                    <div class="post-loop">

                        @foreach($posts as $post)

                            <div class="p-3 border-bottom">
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->body }}</p>
                            </div>

                        @endforeach

                        <div class="mt-3">
                            {{ $posts->links('pagination::bootstrap-4') }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection