@extends('layouts.app')

@section('content')
    <div class="container">
        <article class="card post-single">
            <a href="/{{$post->slug}}" class="img-container" style="background-image:url('{{$post->image}}')"></a>
            <div class="card-content">
                <header class="post-header">
                    <h1>{{$post->title}}</h1>

                    <div class="byline">
                        {{$post->author->name}}
                    </div>
                </header>
                {!! $post->content !!}
            </div>
        </article>
    </div>

@endsection