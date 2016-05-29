@extends('layouts.default')

@section('title')
スケジュール編集
@endsection


@section('blog_title')
<h2>スケジュール編集画面</h2>
@endsection

@section('content')

<h2>1日のスケジュールを記入していきましょう。</h2>
<form method="post" action="{{ url('/calendar',$forms->id)  }}">

 <!--Lalavel特有のCSRF対策をスルーするための対策(TOkenを仕込む)です。 -->
{{ csrf_field() }}
<!-- pacheでデータを渡したいので-->
{{ method_field('patch') }}

<p>
    <input type="text" name='title' placeholder="title" value="{{ old('title',$forms->title) }}">
    @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
    @endif
</p>
<p>
    <textarea name='body' placeholder="本文を入力してください"  cols="8" rows="8">{{ old('body',$forms->body) }}</textarea>
      @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
    @endif
</p>
<p>
    <input type="submit" value="更新する。">
</p>


</form>

@endsection



@section('back')
<a href="{{ url('calendar/note') }}" class="pull-center fs12">Back Home</a>
@endsection
