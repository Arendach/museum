@extends('layout')

@section('content')

    <div class="blog-list-page pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <figure class="mb-50">
                        <blockquote class="blockquote">
                            <p class="text-primary">{{ $quote->t('title') }}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            {{ $quote->people->t('name') }}
                        </figcaption>
                    </figure>

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
                                Читати дальше
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <aside>
                        <div class="blog-aside-item mb-40">
                            <div class="blog-aside-item-inner">
                                <h4 class="widget-title">Search Here</h4>
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- blog aside item end -->
                        <!-- blog aside item -->
                        <div class="blog-aside-item mb-40">
                            <div class="blog-aside-item-inner">
                                <!-- widget title -->
                                <h4 class="widget-title">Країни</h4>
                                <!-- widget title end -->
                                <!-- category list -->
                                <ul class="category-list">
                                    @foreach($countries as $country)
                                        <li class="{{ false ? 'active' : '' }}">
                                            <a href="{{ $country->getUrl() }}">
                                                {{ $country->t('title') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="blog-aside-item mb-40">
                            <div class="blog-aside-item-inner">
                                <h4 class="widget-title">Archive</h4>
                                <ul class="archive-list">
                                    <li class="active"><a href="#">January <span class="copyright-year"></span></a></li>
                                    <li><a href="#">February <span class="copyright-year"></span></a></li>
                                    <li><a href="#">March <span class="copyright-year"></span></a></li>
                                    <li><a href="#">April <span class="copyright-year"></span></a></li>
                                    <li><a href="#">May <span class="copyright-year"></span></a></li>
                                    <li><a href="#">June <span class="copyright-year"></span></a></li>
                                    <li><a href="#">July <span class="copyright-year"></span></a></li>
                                    <li><a href="#">August <span class="copyright-year"></span></a></li>
                                    <li><a href="#">September <span class="copyright-year"></span></a></li>
                                    <li><a href="#">October <span class="copyright-year"></span></a></li>
                                    <li><a href="#">November <span class="copyright-year"></span></a></li>
                                    <li><a href="#">December <span class="copyright-year"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-aside-item mb-40">
                            <div class="blog-aside-item-inner">
                                <h4 class="widget-title">
                                    Останні пости
                                </h4>
                                @foreach($articles->take(3) as $article)
                                    <div class="recent-post flex-row">
                                        <div class="recent-post-left">
                                            <img class="img-fluid" src="img/blog/post-01.jpg" width="80" height="80" alt="">
                                        </div>
                                        <div class="recent-post-body">
                                            <h6><a href="#">{{ $article->t('title') }}</a></h6>
                                            <div class="mt-10">
                                                <ul class="list-inline text-gray font-italic">
                                                    <li>{{ $article->created_at->diffForHumans() }}</li>
                                                    <li>
                                                        @foreach($article->tags as $tag)
                                                            <a href="{{ $tag->getUrl() }}">
                                                                {{ $tag->t('title') }}
                                                            </a>@if(!$loop->last), @endif
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-aside-item mb-40">
                            <div class="blog-aside-item-inner">
                                <h4 class="widget-title">Підписка на новини</h4>
                                <form class="side-newsletter">
                                    <input class="form-control rounded-0 mb-6 border-0" type="email">
                                    <button class="btn-style-1 w-100 rounded-0" type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="blog-aside-item mb-30">
                            <div class="blog-aside-item-inner">
                                <h4 class="widget-title">Теги</h4>
                                <div class="tag-list">
                                    @foreach($tags as $tag)
                                        <a href="{{ $tag->getUrl() }}">
                                            {{ $tag->t('title') }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection
