@extends('layouts.app')

@section('content')
    <div class="display-3">All tweets</div>
    <main>
        @foreach($Tweets as $Tweet)
            <div class="card">
                @if(is_null($Tweet->path))
                    <img src="{{ asset('/img/bird.jpg') }}" class="card-img-top" alt="tweet-image" width="200" height="200">
                @else
                    <img src="{{ $Tweet->path }}" class="card-img-top" alt="tweet-image" width="200" height="200">
                @endif
                <div class="card-header">
                    {{ $Tweet->name }}
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-body-secondary">
                    2 days ago
                </div>
            </div>
        @endforeach
    </main>
@endsection
