@extends('layout')

@section('content')
    @foreach($articles->take(10) as $article)
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
                <li class="list-inline-item">
                    <i class="far fa-comments"></i> <a href="#">06 Comments</a>
                </li>
            </ul>
            <div class="post-media"><a href="#">
                    <figure><img src="img/blog/list-img-1.jpg" alt=""></figure>
                </a></div>
            <p>{!! $article->t('description') !!}</p>
            <a href="{{ $article->getUrl() }}" class="btn-style-1">
                {{ translate('Читати дальше') }}
            </a>
        </div>
    @endforeach
@endsection
