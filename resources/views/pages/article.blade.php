@extends('layout')

@section('content')

    <h2>{{ $article->t('title') }}</h2>

    <hr>

    <figure>
        <img src="{{ $article->getPicture() }}" alt="{{ $article->t('title') }}">
    </figure>

    <hr>

    @if($article->t('description'))
        {!! $article->t('description') !!}

        <hr>
    @endif

    @include('parts.videos', ['videos' => $article->videos])

@endsection
