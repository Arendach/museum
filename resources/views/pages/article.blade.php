@extends('layout')

@section('content')

    <h2>{{ $page->t('title') }}</h2>

    <hr>

    <figure>
        <img src="{{ $page->getPicture() }}" alt="{{ $page->t('title') }}">
    </figure>

    <hr>

    @if($page->t('description'))
        {!! $page->t('description') !!}

        <hr>
    @endif

    @include('parts.videos', ['videos' => $page->videos])

@endsection
