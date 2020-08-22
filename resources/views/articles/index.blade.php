@extends('layout')

@section('content')


    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">

                <h1>Our latest articles</h1>
                <br><br><br>

                <ul class="style1">

                    @forelse ($articles as $article)
                        <li class="first">
                            <h3>
                                <a href="{{ $article->path() }}">{{ $article->title }}</a>
                            </h3>

                            <p>
                                <img src="/images/banner.jpg" alt="this is image" class="image image-full" />
                                {{ $article->excerpt }}
                            </p>
                        </li>
                        @empty
                        <p>No relevent Articles now</p>
                    @endforelse

                </ul>
            </div>
        </div>
        {{ $articles->onEachSide(5)->links() }}
    </div>

@endsection
