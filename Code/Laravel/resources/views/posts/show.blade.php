@extends('layouts.default')

@section('title')
Blog Posts
@endsection


@section('blog_title')
@endsection

@section('img1')
<img src="/assets/img/show.jpg" alt="">
@endsection  


@section('content')
        <h1>{{ $post->title}}</h1>
        <p>{!! nl2br(e($post->body)) !!}</p>
@endsection

@section('back')
<a href="{{ url('/') }}" class="pull-right fs12">Back Home</a>
@endsection

