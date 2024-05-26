@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>{{ __('You are logged in!') }}</div>
                        <br>
                        <div class="text-center"><a href="tweets" class="btn btn-primary mt-3">{{ __('See all Tweets')}}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
