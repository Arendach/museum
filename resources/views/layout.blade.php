<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'EVU.COM.UA' }}</title>
    <link rel="icon" href="favicon.ico"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>

@include('parts.header')

<div class="inner-heading inner-heading-bg pt-90 pb-90 text-center">
    <div class="container">
        <ol class="breadcrumb d-inline-block">
            <li class="breadcrumb-item d-inline-block"><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item d-inline-block"><a href="#">Article</a></li>
            <li class="breadcrumb-item d-inline-block active" aria-current="page">Blog List</li>
        </ol>
        <h1>Blog List</h1>
    </div>
</div>

@yield('content')
<!-- ================ Subscribe area ================ -->
<div class="subscribe-area pt-70 pb-50">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 mb-30">
                <h2>Subscribe to Our Newsletter</h2>
            </div>
            <div class="col-lg-6 mb-30">
                <form class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input type="email" placeholder="Enter your e-mail">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('parts.footer')

</body>
</html>
