@extends('layouts.app')
@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="display-3">All tweets</div>
    <div class="col-12 text-center">
        <a href="tweets/create" class="btn btn-success mt-3">{{ __('Create new Tweet')}}</a>
    </div>
    <main>
        @foreach($Tweets as $tweet)
            <div class="card my-3 offset-2" style="width: 80rem">
                <div class="row">
                    <div class="col-sm-2 tweet-image border-success">
                        @if(is_null($tweet->path))
                            <img src="{{ asset('storage/img/bird.jpg') }}" class="card-img-left" alt="tweet-image" width="200" height="200">
                        @else
                            <img src="{{ asset( $tweet->path)}}" class="card-img-left" alt="tweet-image" width="200" height="200">
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
                            {{ Carbon::parse($tweet->created_at)->setTimezone('Europe/Riga')->format('d-m-Y H:s')}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
