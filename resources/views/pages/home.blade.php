@extends('layout')

@section('content')
    @foreach($articles as $article)
        <div class="blog-list-item mb-30">
            <h3>
                <a href="{{ $article->getUrl() }}">
                    {{ $article->t('title') }}
                </a>
            </h3>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <i class="far fa-clock"></i> {{ $article->created_at->diffForHumans() }}
                </li>
                <li class="list-inline-item">
                    <i class="fas fa-tag"></i>
                    @foreach($article->tags as $tag)
                        <a href="{{ $tag->getUrl() }}">
                            {{ $tag->t('title') }}
                        </a>@if(!$loop->last), @endif
                    @endforeach

                </li>
            </ul>
            <div class="post-media">
                <a href="{{ $article->getUrl() }}">
                    <figure>
                        <img src="{{ $article->getPicture() }}" alt="">
                    </figure>
                </a>
            </div>
            <p>{!! $article->t('short_description') !!}</p>
            <a href="{{ $article->getUrl() }}" class="btn-style-1">
                {{ translate('Читати дальше') }}
            </a>
        </div>
    @endforeach
@endsection
