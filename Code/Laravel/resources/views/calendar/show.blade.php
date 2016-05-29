@extends('layouts.default')

@section('title')
スケジュール管理
@endsection


@section('blog_title')
<h2>スケジュール管理画面</h2>
@endsection

@section('content')
<h2>{{  $forms->title }}</h2>
<p>{!! nl2br(e($forms->body)) !!}</p>
@endsection


@section('back')
<a href="{{ url('/calendar/note') }}" class="pull-center fs12">Back Home</a>
@endsection
