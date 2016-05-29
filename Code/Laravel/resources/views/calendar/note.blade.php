@extends('layouts.default')

@section('title')
更新履歴ノート
@endsection


@section('blog_title')
<h1>更新履歴</h1>
@endsection

@section('content')

{{--これが肝ですな--}}

<a href="{{ url('/calendar/create') }}" class="pull-center fs12">day add</a>






<h2>最新のスケジュールから昇順で表示しています。</h2>
<ul>
    @forelse($forms as $form)
    <li>
       {{--##時間を持ってきて表示しているだけ--}}
       {{$form->created_at}}
       {{-- ##この先以降は$formsを$formとして扱っている## --}}
       <a href="{{ action('CalendarController@show',$form->id) }}">{{ $form->title }} </a>
       <a href="{{ action('CalendarController@edit',$form->id) }}" class="fs12">[編集]</a>
       <form action="{{ action('CalendarController@destroy',$form->id)}}" id="form_{{ $form->id }}"  method="post" style="display:inline">
       
       <!--  csrf対策 -->
       {{  csrf_field()  }}
       <!-- delete --->
       {{  method_field('delete')  }}
       <a href="#" data-id="{{ $form->id }}" onclick="deletePost(this)" class="fs12">[削除]</a>
        </form>
       
    </li>
    @empty
        <li>No posts yet! 何も入っていません!<li>
    @endforelse
</ul>

<center>
    <a href="/calendar">カレンダーに戻る</a>
</center>

<script>
    function deletePost(e){
        'use strict';
        
        if(confirm('スケジュールを本当に削除しますか?')){
            document.getElementById('form_'+e.dataset.id).submit();
        }
        
    }
</script>



@endsection