@extends('layout')

@section('content')

    <h2>{{ $article->t('title') }}</h2>

    <hr>

    <figure>
        <img src="{{ $article->getPicture() }}" alt="">
    </figure>

    {!! $article->t('description') !!}

@endsection
