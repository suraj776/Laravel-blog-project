@extends('layout')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
                <h2>{{$articlpe->title}}</h2>

			</div>
            <p>
                <img src="/images/banner.jpg" alt="this is image" class="image image-full" />
                {!! $article->body !!}
            </p>
            <p>
                @foreach ($article->tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                @endforeach
            </p>

        </div>
	</div>
</div>
@endsection