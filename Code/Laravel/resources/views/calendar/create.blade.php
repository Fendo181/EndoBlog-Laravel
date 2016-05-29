@extends('layouts.default')

@section('title')
スケジュール追加
@endsection


@section('blog_title')
<h2>スケジュール追加画面</h2>
@endsection

@section('content')

<h2>1日のスケジュールを記入していきましょう。</h2>
<form method="post" action="{{ url('calendar/')  }}">

 <!--Lalavel特有のCSRF対策をスルーするための対策(TOkenを仕込む)です。 -->
{{ csrf_field() }}

<p>
    <input type="text" name='title' placeholder="title" value="{{ old('title') }}">
    @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
    @endif
</p>
<p>
    <textarea name='body' placeholder="body" value="{{ old('body') }}" cols="8" rows="8"></textarea>
      @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
    @endif
</p>
<p>
    <input type="submit" value="Add new!">
</p>


</form>

@endsection



@section('back')
<a href="{{ url('calendar/note') }}" class="pull-center fs12">Back Home</a>
@endsection
