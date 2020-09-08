<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
    <link rel="icon" href="img/core-img/favicon.ico">
	<link href="style.css" rel="stylesheet">
	<link href="css/responsive/responsive.css" rel="stylesheet">
</head>

<body>

    @include('modules/search')
    
    @include('modules/menu')
    
    @if ($slides->count() > 0)
        <section class="template-hero-area" id="home">
            <div class="welcome-social-info">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>

            <div class="template-hero-slides owl-carousel">
                @foreach ($slides as $slide)
                    <div class="single-hero-slides bg-img" style="background-image: url({{ $slide->photo }});">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-11 col-md-6 col-lg-4">
                                    <div class="hero-content">
                                        <h2>{{ $slide->name }}</h2>
                                        <p>{{ $slide->excerpt }}</p>
                                        <a href="{{ route('show.by.more', $slide->slug) }}" class="btn template-btn"><span></span> Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="template-about-us-area" id="about">
        <div class="container">
            @foreach ($rows as $row)
                <div class="about-us-second-part">
                    <div class="row align-items-center pt-200">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="about-us-content">
                                <span>{{ $row->title }}</span>
                                <p>{{ $row->excerpt }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ml-md-auto">
                            <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                                <img src="{{ $row->photo }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>    
            @endforeach
        </div>
    </section>

    <section class="template-dish-menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Menu</h2>
                    </div>
                    <a href="/posts" class="btn template-btn"><span></span> View The Menu</a>
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

    <section class="template-reservation-area d-md-flex align-items-center" id="reservation">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Reservation</h2>
                </div>
                <form>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Select Persons">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="col-12">
                            <textarea name="reservation-message" class="form-control" id="reservationMessage" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn template-btn"><span></span> Reserve Your Desk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="img/bg-img/hero-3.jpg" alt="">
        </div>
    </section>

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

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/others/plugins.js"></script>
    <script src="js/active.js"></script>
</body>