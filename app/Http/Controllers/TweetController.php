<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()) {
            redirect('welcome');
        }

        $Tweets = DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->select('tweets.*', 'users.name')
            ->get();

        return view('tweets.index', ['Tweets' => $Tweets]);
    }


/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) {
            redirect('welcome');
        }

        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTweetRequest $request)
    {
        if(!Auth::check()) {
            redirect('welcome');
        }

        $request->validate([
            'text' => 'required|max:280',
//            'image' => 'nullable|image'
        ]);

        Tweet::create([
            'text' => $request->text,
            'user_id' => Auth::id()
        ]);

        return redirect('/tweets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTweetRequest $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}