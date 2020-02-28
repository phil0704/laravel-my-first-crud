<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tweets = Tweet::all();

        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate(array(
          'message'=> 'required|max:255',
          'author' => 'required|max:64'
        ));

        $tweet = Tweet::create($validateData);
        return redirect('/tweets')->with('success', 'Tweet saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tweet = Tweet::findOrFail($id);
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate(array(
          'message'=> 'required|max:255',
          'author' => 'required|max:64'
        ));
        Tweet::whereId($id)->update($validateData);
        return redirect('/tweets')->with('success', 'Tweet updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();

        return redirect('/tweets')->with('success', 'Tweet deleted');
    }
}
