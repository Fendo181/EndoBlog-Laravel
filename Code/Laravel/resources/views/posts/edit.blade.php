@extends('layouts.default')

@section('title')
Edit Blog!
@endsection


@section('blog_title')
@endsection


@section('img1')
<img src="/assets/img/show.jpg" alt="">
@endsection  

@section('content')
        
        
        
        <form method="post" action="{{ url('/posts',$post->id)}}" >
          <!--Lalavel特有のCSRF対策をスルーするための対策(TOkenを仕込む)です。 -->
          {{ csrf_field() }}
          <!-- pacheでデータを渡したいので-->
          {{ method_field('patch') }}
           
            <p1>Title</p1>
            <p>
                <input type="text" name="title" placeholder="title" value="{{ old('title', $post->title) }}">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </p>
            
            <p1>What do today?</p1>
            <p>
                <textarea name="body" placeholder="body" cols="40" rows="40">{{ old('body', $post->body) }}</textarea>
                @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
                @endif
            </p>
              
            <p>
                <input type="submit" value="Update">
            </p>
        </form>
@endsection

@section('back')
    <a href="{{ url('/') }}" class="pull-right fs12">Back Home</a>
@endsection
