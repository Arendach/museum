<!DOCTYPE html>
<html lang="en">
<head>
    {{-- [ Meta ] --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($page) ? $page->seoTitle() : ($title ?? '') }}</title>
    <meta name="robots" content="{{ isset($page) ?$page->seoIndex() : '' }}">
    <meta name="robots" content="{{ isset($page) ?$page->seoFollow() : '' }}">
    <meta name="description" content="{{ isset($page) ?$page->seoDescription() : '' }}">
    <meta name="keywords" content="{{ isset($page) ?$page->seoKeywords() : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- [ Favicon ] --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{-- [ Styles ] --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- [ Translations ] --}}
    @if(file_exists(public_path('translations/' . app()->getLocale() . '.js')))
        <script
            src="{{ asset('translations/' . app()->getLocale() . '.js') }}?v="{{ Cache::rememberForever('translation_key', fn() => Str::random(6)) }}></script>
    @endif
</head>

<body>

@include('parts.header')

<div class="inner-heading inner-heading-bg pt-90 pb-90 text-center">
    <div class="container">
        <ol class="breadcrumb d-inline-block">
            <li class="breadcrumb-item d-inline-block">
                <a href="{{ url('/') }}">
                    <i class="fas fa-home"></i> {{ request()->getHost() }}
                </a>
            </li>
            @if(isset($breadcrumbs) || isset($page) && method_exists($page, 'breadcrumbs'))
                @php $breadcrumbs = $breadcrumbs ?? (isset($page) && method_exists($page, 'breadcrumbs') ? $page->breadcrumbs() : []) @endphp
                @foreach($breadcrumbs as $breadcrumb)
                    @if(!$loop->last)
                        <li class="breadcrumb-item d-inline-block">
                            <a href="{{ $breadcrumb[1] }}">
                                {{ $breadcrumb[0] }}
                            </a>
                        </li>
                    @else
                        <li class="breadcrumb-item d-inline-block active" aria-current="page">
                            {{ $breadcrumb[0] }}
                        </li>
                    @endif
                @endforeach
            @endif
        </ol>
        <h1>{{ isset($page) ? $page->seoH1() : '' }}</h1>
    </div>
</div>


<div class="blog-list-page pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('parts.quote')

                @yield('content')

            </div>
            <div class="col-lg-4">
                @include('parts.aside')
            </div>
        </div>
    </div>
</div>

<div class="subscribe-area pt-70 pb-50">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 mb-30">
                <h2>{{ translate('Підписатись на наші новини') }}</h2>
            </div>
            <div class="col-lg-6 mb-30">
                <form class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="email" placeholder="{{ translate('Введіть Ваш E-Mail') }}">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="submit">{{ translate('Підписатись') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('parts.footer')

@yield('scripts')

</body>
</html>
