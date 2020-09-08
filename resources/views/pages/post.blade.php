@extends('layouts/regular')
@section('title', 'Post')
@section('header', $post->name)

@section('content')

<h1 class="mt-4">{{ $post->name }}</h1>


<p>Posted on {{ $post->created_at }}</p>

<hr>

<img class="img-fluid" src="{{ $post->photo }}" alt="">
<h5>{{ $post->title }}</h5>
<p class="lead">{!! $post->content !!}</p>


@endsection