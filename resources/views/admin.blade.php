@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Auth::user() )
                        {{ __('You are logged in!') }}
                    @else
                        {{ __('You are logout!') }}
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection