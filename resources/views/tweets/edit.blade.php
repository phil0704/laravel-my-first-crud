@extends('layout')

@section('title')
Edit Tweet
@endsection
@section('content')


<h1>Edit Tweet Form</h1>
<p>Use this form to edit your Tweet!</p>
<div role="alert">
  @if ($errors->any())
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  @endif

</div>
<form method="post" action="{{ route('tweets.update', $tweet->id) }}">
  @csrf
  @method('PATCH')
  {{-- ^^^ Cross-site request forgery protection --}}
<label for="mesage">
  <strong>Input a Message</strong>
  <textarea name="message" id="message" rows="10" cols="30">
 {{$tweet->message}}
  </textarea>
</label>
  <label for="author"><strong>Author Name:</strong>
  <input type="text" name="author" id="author" value="{{$tweet->author}}">
</label>
<input type="submit" value="Update Tweet">
</form>

@endsection
