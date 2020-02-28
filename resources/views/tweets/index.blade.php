@extends('layout')

@section('title')
Tweets index
@endsection
@section('content')
<h1>Tweets Index</h1>
@if (session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
<p>List of Tweets</p>
<ul>
  @foreach($tweets as $tweet)
  <li>
  <h2>{{ $tweet->author }}</h2>
  <p>
     {{ $tweet->message }}
  </p>
<ul>
  <li>
    <a href="{{route('tweets.edit',$tweet->id)}}">
      Edit Tweet
    </a>
  </li>
  <li>
  <form action="{{route('tweets.destroy', $tweet->id)}}" method="post">
    @csrf
     @method('DELETE')
     <input type="submit" value="Delete Tweet">
  </form>
  </li>
</ul>
  </li>
  @endforeach
</ul>
@endsection
