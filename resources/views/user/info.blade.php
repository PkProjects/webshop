@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">You are looking at {{ $user->name }}  </h1>
                        <p>Their email adress is {{ $user->email }} </p>
                        <p>Their user ID is {{ $user->id }}</p>
                        <p>These are their posts:</p>
                    @if( isset($user->blogPosts) )
                    @foreach($user->blogPosts as $post)
                    <ul>
                        <li><b><a href="{{route('blog.show', $post->id)}}">{{ $post->title }}</a></b></li>
                        <li>{{ $post->body }}</li>
                    </ul>
                    @endforeach
                    @endif
                    </div>
                    <div class="col-8">
                        <p>These are their comments:</p>
                    @if( isset($user->comments) )
                    @foreach($user->comments as $comment)
                    <ul>
                    @if($comment->blogPost != null)
                        <li><b><a href="/blog/{{$comment->blogPost->id}}">{{ $comment->blogPost->title }}</a></b></li>
                        <li>{{ $comment->body }}</li>
                        @endif
                    </ul>
                    @endforeach
                    @endif
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection