@extends('layouts.default')

@section('title')
遠藤ブログ
@endsection


@section('blog_title')
<!-- <h1>Welcome EndoBlog!</h1> -->
@endsection

@section('img1')
<img src="/assets/img/top.jpg" alt="" width="600" height="400">
@endsection  

@section('about')
<h2>遠藤ブログの使い方</h2>
@endsection

@section('back')
    <a href="{{ url('/') }}">Back Home</a>
@endsection

