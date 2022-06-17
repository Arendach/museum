@extends('layout')

@section('content')

    <h1>
        {{ $country->t('title') }}
    </h1>

    <hr>

    <figure>
        <img src="{{ $country->getPicture() }}" alt="">
    </figure>

    {!! $country->t('description') !!}

    @if($country->weapons->count())
        <div class="blog-area pt-80 pb-50">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2>
                        {!! translate('<span><strong>Зброя</strong> країни</span>') !!}
                    </h2>
                </div>
                <div class="row">
                    @foreach($country->weapons as $weapon)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                            <div class="blog-item">
                                <h3><a href="#">{{ $weapon->t('title') }}</a></h3>
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

@endsection
