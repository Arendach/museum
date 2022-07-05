@php /** @var \App\Models\Article[] $popularArticles */ @endphp
@php /** @var \App\Models\Tag[] $tags */ @endphp
@php /** @var \App\Models\Country[] $countries */ @endphp

<aside>
    <div class="blog-aside-item mb-40">
        <div class="blog-aside-item-inner">
            <h4 class="widget-title">
                {{ translate('Пошук на сайті') }}
            </h4>
            <div class="search-form">
                <form action="#">
                    <input type="text" placeholder="{{ translate('Пошук') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    @if($countries->count())
        <div class="blog-aside-item mb-40">
            <div class="blog-aside-item-inner">
                <h4 class="widget-title">{{ translate('Країни') }}</h4>
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
    @endif

    @if($popularArticles->count())
        <div class="blog-aside-item mb-40">
            <div class="blog-aside-item-inner">
                <h4 class="widget-title">
                    {{ translate('Популярні записи') }}
                </h4>
                @foreach($popularArticles as $article)
                    <div class="recent-post flex-row">
                        <div class="recent-post-left">
                            <img class="img-fluid" src="{{ $article->getPicture() }}" width="80" height="80" alt="">
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
    @endif

    <div class="blog-aside-item mb-40">
        <div class="blog-aside-item-inner">
            <h4 class="widget-title">{{ translate('Підписка на новини') }}</h4>
            <form class="side-newsletter">
                <input class="form-control rounded-0 mb-6 border-0" type="email" placeholder="{{ translate('Введіть Ваш E-Mail') }}">
                <button class="btn-style-1 w-100 rounded-0" type="submit">{{ translate('підписатись') }}</button>
            </form>
        </div>
    </div>

    <div class="blog-aside-item mb-30">
        <div class="blog-aside-item-inner">
            <h4 class="widget-title">{{ translate('Теги') }}</h4>
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
