<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{route('home.index')}}">
                <img width="250" src="{{asset('images/logo.png')}}" alt="#"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home.index')}}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="true">
                            <span class="nav-label">Pages
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">About</a></li>
                            <li><a href="">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>

                    @if(!Auth::user())
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('login')}}"> Buy Now
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 29 29"
                                     id="user" style="width: 23px; height: 23px">
                                    <path
                                        d="M14.5 2A12.514 12.514 0 0 0 2 14.5 12.521 12.521 0 0 0 14.5 27a12.5 12.5 0 0 0 0-25Zm7.603 19.713a8.48 8.48 0 0 0-15.199.008A10.367 10.367 0 0 1 4 14.5a10.5 10.5 0 0 1 21 0 10.368 10.368 0 0 1-2.897 7.213ZM14.5 7a4.5 4.5 0 1 0 4.5 4.5A4.5 4.5 0 0 0 14.5 7Z"></path>
                                </svg>
                            </a>
                        </li>
                    @endif
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->