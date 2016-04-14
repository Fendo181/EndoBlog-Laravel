@extends('layouts.default')

@section('title')
Blog Posts
@endsection


@section('blog_title')
<!-- <h1>Welcome EndoBlog!</h1> -->
@endsection

@section('img1')
<img src="/assets/img/top.jpg" alt="" width="600" height="400">
@endsection  



@section('content')
        Start Your Bolg Now!　→
        <a href="{{ url('/posts/create') }}" class="fs12">[Add new Blog]</a>
        <h2>
        <ul>
        @forelse ($posts as $post)
        <li>
        <b>{{ $post->updated_at }}</b>
        <a href="{{ action('PostsController@show',$post->id)}}">{{ $post->title }} </a>
        
        
        <a href="{{ action('PostsController@edit',$post->id)}}" class="fs12">[編集する]</a>
        
         <form action="{{ action('PostsController@destroy', $post->id) }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
      <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="fs12">[削除する]</a>
        </form>
        </li>
        @empty
            <li>No posts yet!</li>
        @endforelse
        </ul>
        </h2>
<script>
function deletePost(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection


@section('about')
    <a href="{{ url('/about') }}">遠藤ブログの使い方</a>
@endsection

@section('aboutme')
    <a href="{{ url('/aboutme') }}">About me</a>
@endsection

@section('git')
    <a href="{{ url('https://github.com/Fendo181/Laravel_repos') }}">Souce Code(GitHub)</a>
@endsection

@section('Dot')
    <a href="{{ url('/Dot') }}">その他のコンテンツ(簡易掲示板)</a>
@endsection







