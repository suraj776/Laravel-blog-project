@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">

@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
            <form action="/articles" method="post">
                @csrf <!-- cross site request forgery -->
                <div class="field">
                    <label for="title" class="label">
                        Title
                    </label>
                    <div class="control">
                    <input class="input @error('title') is-danger @enderror" name="title" id="title" type="text" value="{{old('title')}}" >
                        @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">
                        Excerpt
                    </label>
                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt" ></textarea>
                        @error('excerpt')
                        <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="body" class="label">
                        Body
                    </label>
                    <div class="control">
                        <textarea name="body" id="body" class="textarea @error('body') is-danger @enderror" ></textarea>
                         @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="tags" class="label">
                        Tags
                    </label>
                    <div class="select is-multiple control">a
                        <select name="tags[]" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
