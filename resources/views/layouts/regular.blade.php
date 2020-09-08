<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="/style.css" rel="stylesheet">
    <link href="/css/responsive/responsive.css" rel="stylesheet">
</head>

<body>

    <div class="template-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="templateSearch" id="search" placeholder="Search Your Favourite Dish ...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('modules/menu')

    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/hero-5.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>@yield('header')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="template-regular-page section-padding-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="regular-page-content">

                        <div class="post-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (request()->is('posts'))
    <section class="template-dish-menu clearfix" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Recommended</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latests as $latest)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="template-single-dish wow fadeInUp" data-wow-delay="0.5s">
                            <a href="/posts/{{ $latest->slug }}"><img src="{{ $latest->photo }}" alt="{{ $latest->name }}"></a>
                            <div class="dish-info">
                                <h6 class="dish-name">{{ $latest->name }}</h6>
                                <a href="/posts/{{ $latest->slug }}"><p class="dish-price">...</p></a>
                            </div>
                        </div>
                    </div>                    
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <footer class="template-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-text">
                        <p>Copyright &copy; 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/bootstrap/popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/others/plugins.js"></script>
    <script src="/js/active.js"></script>
</body>