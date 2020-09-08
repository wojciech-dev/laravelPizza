<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PIzza - Menu</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="/style.css" rel="stylesheet">
    <link href="/css/responsive/responsive.css" rel="stylesheet">
</head>

<body>

    @include('modules/search')

    @include('modules/menu')

    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/hero-2.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>{{ $categoty_name ?? 'Menu' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="template-food-menu section-padding-50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="food-menu-title">
                        <h2> Menu</h2>
                    </div>
                </div>

                <div class="col-10">
                    @if (request()->is('search'))
                        <div class="section-heading">
                            <h2>Search result: {{ $posts->count() }}</h2>
                        </div>
                    @endif

                    @if ($posts->count() > 0)
                    <div class="template-menu-slides owl-carousel clearfix">
                        <div class="template-portfolio clearfix">
                        @for ($i = 0; $i < $posts->count(); $i++)
                        <div class="single_menu_item wow fadeInUp">
                            <div class="d-sm-flex align-items-center">
                                <div class="dish-thumb">
                                    <a href="/posts/{{ $posts[$i]['slug'] }}"><img src="{{ $posts[$i]->photo }}" alt=""></a>
                                </div>
                                <div class="dish-description">
                                    <h3><a href="/posts/{{ $posts[$i]['slug'] }}">{{ $posts[$i]['name'] }}</a></h3>
                                    <p>{{ $posts[$i]->excerpt }}</p>
                                </div>
                                <div class="dish-value">
                                    <a href="/posts/{{ $posts[$i]['slug'] }}"><h3>...</h3></a>
                                </div>
                            </div>
                        </div>
                          @if ($i == 4)
                            </div><div class="single_menu_item wow fadeInUp">
                          @endif
                        @endfor
                    </div>
                    </div>
                    @else
                    <div class="alert alert-info" role="alert">
                        There are no recipes
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

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