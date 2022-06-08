@extends('layout')

@section('content')

    <h1>
        {{ $country->t('title') }}
    </h1>

    {!! $country->t('description') !!}

@endsection
