@php /** @var  \App\Models\Weapon $weapon */ @endphp
@extends('layout')

@section('content')

    <h2>{{ $weapon->t('title') }}</h2>

    <hr>

    <figure>
        <img src="{{ $weapon->getPicture() }}" alt="{{ $weapon->t('title') }}">
    </figure>

    {!! $weapon->t('description') !!}

@endsection
