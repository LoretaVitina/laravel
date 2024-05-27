@extends('layouts.app')

@section('content')
    <div class="display-3">All tweets</div>
    <div class="col-12 text-center">
        <a href="tweets/create" class="btn btn-success mt-3">{{ __('Create new Tweet')}}</a>
    </div>
    <main>
        @foreach($Tweets as $tweet)
            <div class="card text-center my-3">
                <div class="row">
                    <div class="col-sm-2 tweet-image border-success">
                        @if(is_null($tweet->path))
                            <img src="{{ asset('storage/img/bird.jpg') }}" class="card-img-top" alt="tweet-image" width="200" height="200">
                        @else
                            <img src="{{ $tweet->path }}" class="card-img-top" alt="tweet-image" width="200" height="200">
                        @endif
                    </div>
                    <div class="col-sm-10">
                        <div class="card-header">
                            {{ $tweet->name }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $tweet->text }}</p>
                        </div>
                        <div class="card-footer text-body-secondary">
                            {{ $tweet->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
