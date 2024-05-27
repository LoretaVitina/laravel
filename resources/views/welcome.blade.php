@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-6 text-center">
                    <a href="register" class="btn btn-primary mt-3">{{ __('If you are new, register!')}}</a>
                </div>
                <div class="col-6 text-center">
                    <a href="login" class="btn btn-success mt-3">{{ __('If you have registered, login')}}</a>
                </div>
            </div>
        </div>
    <div>
@endsection

