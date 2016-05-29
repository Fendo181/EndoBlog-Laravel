@extends('layouts.default')

@section('title')
スケジュール追加
@endsection


@section('blog_title')
<h2>スケジュール追加画面</h2>
@endsection

@section('content')

<h2>1日のスケジュールを記入していきましょう。</h2>



@endsection



@section('back')
<a href="{{ url('calendar/note') }}" class="pull-center fs12">Back Home</a>
@endsection
