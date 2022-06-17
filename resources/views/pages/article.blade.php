@extends('layout')

@section('content')

    <h2>{{ $article->t('title') }}</h2>

    <hr>

    <figure>
        <img src="{{ $article->getPicture() }}" alt="{{ $article->t('title') }}">
    </figure>

    {!! $article->t('description') !!}

@endsection
