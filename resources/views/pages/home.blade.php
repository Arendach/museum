@extends('layout')

@section('content')
    <div id="app">
        <app title="{{ setting('Заголовок головної сторінки', 'string', 'Енциклопедія вільного українця') }}"/>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/home.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/home.css') }}">
@endsection
