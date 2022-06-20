@php /** @var \App\Models\Video[] $videos */ @endphp

@if($videos->count())
    <div class="blog-area pt-80 pb-50">
        <div class="container">
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="blog-item">
                            <h3>
                                <a href="{{ $video->getUrl() }}">
                                    {{ $video->t('title') }}
                                </a>
                            </h3>
                            <time class="post-classic-time mt-12 mb-20" datetime="2021">
                                {{ $video->created_at->diffForHumans() }}
                            </time>
                            <div class="blog-item-img mb-20">
                                <video controls width="250">
                                    <source src="{{ $video->getPath() }}" type="video/mp4">
                                    Sorry, your browser doesn't support embedded videos.
                                </video>
                            </div>
                            <div class="blog-item-des">
                                <p>
                                    {{ $video->firstParagraph('description') }}
                                </p>
                                <ul class="blog-modern-meta">
                                    <li>
                                        <a href="{{ $video->getUrl() }}" class="btn-style-1 btn-sm text-white">
                                            {{ translate('Детальніше') }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="far fa-comments"></i>
                                        <a href="{{ $video->getUrl() }}">
                                            {{ translate('[count] коментарі(в)', ['[count]' => 0]) }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- blog item end -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
