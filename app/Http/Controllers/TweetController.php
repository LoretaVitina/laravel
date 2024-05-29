<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;
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
            return redirect('/');
        }

        $Tweets = DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->select('tweets.*', 'users.name')
            ->orderBy('tweets.created_at', 'desc')
            ->get();

        return view('tweets.index', ['Tweets' => $Tweets]);
    }


/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('/');
        }

        return view('tweets.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tweet-text' => 'required|max:280',
            'tweet-image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = null;
        if($request->hasFile('tweet-image')){
            $path = $request->file('tweet-image')->store('/tweet-images', 'public');
        }

        Tweet::create([
            'user_id' => Auth::id(),
            'text' => $request->input('tweet-text'),
            'path' => '/storage/' . $path
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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tweet::where(['id' => $id])->delete();

        return redirect('/tweets');
    }
}
