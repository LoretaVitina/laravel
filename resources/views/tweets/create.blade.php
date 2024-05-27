@extends('layouts.app')

@section('content')
    <div class="display-3">Create new Tweet</div>
    <form action="../tweets" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tweetArea"></label>
            <textarea class="form-control" id="tweetArea" rows="3" placeholder="Write your Tweet here (max 280 characters)" maxlength="280" name="text" required></textarea
                @if($errors->has('text'))
                    @foreach($errors->get('text') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                @endif
        </div>
        <div class="form-group">
            <label for="fileUpload">{{ __('Upload your image here') }}</label>
            <input type="file" class="form-control-file" id="fileUpload" name="path" accept="image/*">
        </div>
        <button class="btn btn-warning mt-3" type="submit">{{ __('Post the Tweet') }}</button>
    </form>
@endsection

