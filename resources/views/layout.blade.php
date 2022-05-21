<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? request()->getHost() }}</title>
    <link rel="icon" href="favicon.ico"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
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
            @if(isset($breadcrumbs))
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
        <h1>{{ $title ?? request()->getHost() }}</h1>
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

</body>
</html>
