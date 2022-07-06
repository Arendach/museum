@php /** @var \App\Models\Country $page */ @endphp
@extends('layout')

@section('content')

    <h1>
        {{ $page->t('title') }}
    </h1>

    <hr>

    <figure>
        <img src="{{ $page->getPicture() }}" alt="{{ $page->t('title') }}">
    </figure>

    {!! $page->t('description') !!}

    @if($page->weapons->count())
        <div class="blog-area pt-80 pb-50">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2>
                        {!! translate('<span><strong>Зброя</strong> країни</span>') !!}
                    </h2>
                </div>
                <div class="row">
                    @foreach($page->weapons as $weapon)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                            <div class="blog-item">
                                <h3>
                                    <a href="{{ $weapon->getUrl() }}">
                                        {{ $weapon->t('title') }}
                                    </a>
                                </h3>
                                <time class="post-classic-time mt-12 mb-20">
                                    {{ $weapon->date }}
                                </time>
                                <div class="blog-item-img mb-20">
                                    <picture><img src="{{ $weapon->getPicture() }}" alt=""></picture>
                                    <div class="hover d-flex justify-content-center align-items-center"></div>
                                </div>
                                <div class="blog-item-des">
                                    {!! $weapon->firstParagraph('description') !!}
                                    <ul class="blog-modern-meta">
                                        <li>
                                            <a href="{{ $weapon->getUrl() }}" class="btn-style-1 btn-sm text-white">
                                                {{ translate('Читати дальше') }}
                                            </a>
                                        </li>
                                        <li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    @if($page->peoples->count())
        <div class="team-area pt-80 pb-50">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2>
                        {!! translate('<span><strong>Люди</strong> країни</span>') !!}
                    </h2>
                </div>
                <div class="row">
                    @foreach($page->peoples as $people)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                            <div class="single-member-wrapper">
                                <div class="member-image">
                                    <picture>
                                        <img src="{{ $people->getPicture() }}" class="img-fluid"
                                             alt="{{ $people->t('name') }}">
                                    </picture>
                                    <div class="member-hover"></div>
                                </div>
                                <div class="member-details">
                                    <h3>
                                        <a href="{{ $people->getUrl() }}">
                                            {{ $people->t('name') }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection
