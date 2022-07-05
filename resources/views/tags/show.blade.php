@php /** @var \App\Models\Tag $page */ @endphp
@extends('layout')

@section('content')

    <h2>{{ $page->t('title') }}</h2>

    <hr>

    @if($page->hasPicture())
        <figure>
            <img src="{{ $page->getPicture() }}" alt="{{ $page->t('title') }}">
        </figure>

        <hr>
    @endif

    @if($page->t('description'))
        {!! $page->t('description') !!}

        <hr>
    @endif

    <div id="app">
        <index :tag="{{ json_encode($page) }}"></index>
    </div>

@endsection

@section('scripts')
    <script src="{{ mix('js/tags.js') }}"></script>
@endsection
