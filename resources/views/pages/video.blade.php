@extends('layout')

@section('content')

    <h2>{{ $video->t('title') }}</h2>

    <hr>

    <video controls style="width: 100%">
        <source src="{{ $video->getPath() }}" type="video/mp4">
        Sorry, your browser doesn't support embedded videos.
    </video>

    <div>
        {{ translate('Джерело:') }} <a href="{{ $video->getSourceUrl() }}">{{ $video->getSourceTitle() }}</a>
    </div>

    <hr>

    @if($video->t('description'))
        {!! $video->t('description') !!}

        <hr>
    @endif

    @include('parts.comments')

@endsection
