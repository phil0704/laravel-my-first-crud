@extends('layout')
@section('title')
Create Tweet Form
@endsection
@section('content')

<h1>Create Tweet Form</h1>
<p>Fill out this form to create a Tweet!</p>
<div role="alert">
  @if ($errors->any())
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  @endif

</div>
<form method="post" action="{{ route('tweets.store') }}">
  @csrf
  {{-- ^^^ Cross-site request forgery protection --}}
<label for="mesage">
  <strong>Input a Message</strong>
  <textarea name="message" id="message" rows="10" cols="30"></textarea>
</label>
  <label for="author"><strong>Author Name:</strong>
  <input type="text" name="author" id="author">
</label>
<input type="submit" value="Publish Tweet">
</form
