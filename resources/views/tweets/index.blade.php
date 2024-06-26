@extends('layouts.app')
@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
    <div class="display-3">All tweets</div>
    <div class="col-12 text-center">
        <a href="{{ route('tweets.create') }}" class="btn btn-success mt-3">{{ __('Create new Tweet')}}</a>
    </div>
    <main>
        @foreach($Tweets as $tweet)
            <div class="card my-3 offset-2" style="width: 80rem">
                <div class="row">
                    <div class="col-sm-2 tweet-image border-success">
                        @if(($tweet->path) == '/storage/' . null or is_null($tweet->path))
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
                        @if(Auth::id() == $tweet->user_id)
                            <div class="row my-2">
                                <div class="col-12 text-center">
                                    <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mt-3">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
