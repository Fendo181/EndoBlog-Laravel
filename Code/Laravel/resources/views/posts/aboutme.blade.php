@extends('layouts.default')

@section('title')
About me
@endsection


@section('blog_title')
<!-- <h1>Welcome EndoBlog!</h1> -->
@endsection

@section('img1')
<img src="/assets/img/top.jpg" alt="" width="600" height="400">
@endsection  

@section('aboutme')
<h2>製作者</h2>
@endsection

@section('back')
    <a href="{{ url('/') }}">Back Home</a>
@endsection

