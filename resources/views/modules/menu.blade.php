<header class="header_area" id="header">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg align-items-center">
                    <a class="navbar-brand" href="/">Pizza</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#templateNav" aria-controls="templateNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                    <div class="collapse navbar-collapse" id="templateNav">
                        <ul class="navbar-nav ml-auto" id="templateMenu">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            @if ($category->count() > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($category as $categories)
                                            <a class="dropdown-item" href="/cat/{{ $categories->slug }}">{{ $categories->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/#about">About Us</a>
                            </li>
                            <li class="nav-item {{ (request()->is('posts')) ? 'active' : '' }}">
                                <a class="nav-link" href="/posts">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#reservation">Reservation</a>
                            </li>
                            <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        </ul>
                        <div class="template-search-btn">
                            <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>