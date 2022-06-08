<header>
    <div class="header-lover">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo.png" alt="">
                </a>
                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample03"
                        aria-controls="navbarsExample03"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                Home
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.html">
                                About us
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="dropdown01"
                               data-bs-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu"
                                 aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="services.html">
                                    Services
                                </a>
                                <a class="dropdown-item" href="service-details.html">
                                    Service Details</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#" id="dropdown02"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                Project
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown02">
                                <a class="dropdown-item" href="project.html">
                                    Project
                                </a>
                                <a class="dropdown-item" href="project-details.html">
                                    Project Details
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="dropdown03"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                Blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                <a class="dropdown-item" href="blog-list.html">Blog List</a>
                                <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="dropdown04"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                {{ LaravelLocalization::getCurrentLocaleNative() }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @foreach(LaravelLocalization::getSupportedLocales() as $key => $locale)
                                    <a class="dropdown-item" href="{{ LaravelLocalization::localizeURL(null, $key) }}">
                                        {{ $locale['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item nav-btn">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                <span><i class="fas fa-search"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
