<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{ asset('/soon/assets/css/bootstrap.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('/soon/assets/css/animate.min.css') }}">
    <!-- FontAwesome Min CSS -->
    <link rel="stylesheet" href="{{ asset('/soon/assets/css/fontawesome.min.css') }}">
    <!-- Style Min CSS -->
    <link rel="stylesheet" href="{{ asset('/soon/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/soon/assets/css/responsive.css') }}">

    <title>{{ env('APP_NAME') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('/soon/assets/img/favicon.png') }}">
</head>

<body>

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Coming Soon Area -->
<div class="coming-soon-area">
    <video loop muted autoplay poster="#" class="video-background">
        <source src="{{ asset('soon/assets/video/world.mp4')}}" type="video/mp4">
    </video>

    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="coming-soon-content">
                    <div class="logo">
                        <a href=""><img src="{{ asset('/soon/assets/img/bell-icon.png')}}" alt="image"></a>
                    </div>

                    <div id="timer">
                        <div id="days"></div>
                        <div id="hours"></div>
                        <div id="minutes"></div>
                        <div id="seconds"></div>
                    </div>

                    <h1><span>We are</span> coming soon</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida maecenas accumsan.</p>

                    <div class="btn-box">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Home</a>

                        @else
                            <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="particles-js"></div>

    <footer class="footer-area">
        <div class="container">
            <ul>
                <li><span>Stay Connect:</span></li>
                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></i></li>
                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<!-- End Coming Soon Area -->

<!-- Sidebar Modal -->
<div class="sidebar-modal">
    <div class="sidebar-modal-inner">
        <div class="about-area">
            <div class="title">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis suspendisse ultrices gravida. Risus commodo viverra. Quis suspendisse ultrices gravida.</p>
            </div>
        </div>

        {{--        <div class="contact-area">--}}
        {{--            <div class="title">--}}
        {{--                <h2>Contact Us</h2>--}}
        {{--            </div>--}}

        {{--            <div class="contact-form">--}}
        {{--                <form id="contactForm">--}}
        {{--                    <div class="form-group">--}}
        {{--                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">--}}
        {{--                        <div class="help-block with-errors"></div>--}}
        {{--                    </div>--}}

        {{--                    <div class="form-group">--}}
        {{--                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">--}}
        {{--                        <div class="help-block with-errors"></div>--}}
        {{--                    </div>--}}

        {{--                    <div class="form-group">--}}
        {{--                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>--}}
        {{--                        <div class="help-block with-errors"></div>--}}
        {{--                    </div>--}}

        {{--                    <button type="submit">Send Message</button>--}}
        {{--                    <div id="msgSubmit" class="h3 text-center hidden"></div>--}}
        {{--                    <div class="clearfix"></div>--}}
        {{--                </form>--}}
        {{--            </div>--}}

        {{--            <div class="contact-info">--}}
        {{--                <div class="contact-info-content">--}}
        {{--                    <h3>Contact us by Phone Number or Email Address</h3>--}}
        {{--                    <h2>--}}
        {{--                        <a href="tel:+0881306298615">+088 130 629 8615</a>--}}
        {{--                        <span>OR</span>--}}
        {{--                        <a href="mailto:emilono@gmail.com">emilono@gmail.com</a>--}}
        {{--                    </h2>--}}

        {{--                    <ul class="social">--}}
        {{--                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>--}}
        {{--                        <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>--}}
        {{--                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>--}}
        {{--                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>--}}
        {{--                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <span class="close-btn sidebar-modal-close-btn"><i class="fas fa-times"></i></span>
    </div>
</div>
<!-- End Sidebar Modal -->

<!-- Subscribe Modal -->
<div class="subscribe-modal">
    <div class="subscribe-modal-inner">
        <div class="subscribe-modal-content">
            <div class="newsletter-header">
                <div class="animation-icons">
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                    <span class="animate-icon"><i class="far fa-envelope"></i></span>
                </div>

                <img src="{{ asset('soon/assets/img/bell-icon.png') }}" alt="image">
            </div>

            <h2>Subscribe Newsletter</h2>
            <p>Being the first to know always feels great. Signing up to our newsletter gives you exclusive access to our Grand Opening!</p>

            <form class="newsletter-form" data-toggle="validator">
                <input type="email" class="input-newsletter" placeholder="Enter email address" name="EMAIL" required autocomplete="off">

                <button type="submit">Subscribe Now</button>
                <div id="validator-newsletter" class="form-result"></div>
            </form>

            <span class="close-btn subscribe-modal-close-btn"><i class="fas fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Subscribe Modal -->

<!-- jQuery Min JS -->
<script src="{{ asset('/soon/assets/js/jquery.min.js') }}"></script>
<!-- Popper Min JS -->
<script src="{{ asset('/soon/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap Min JS -->
<script src="{{ asset('/soon/assets/js/bootstrap.min.js') }}"></script>
<!-- Particles Min JS -->
<script src="{{ asset('/soon/assets/js/particles.min.js') }}"></script>
<!-- WOW Min JS -->
<script src="{{ asset('/soon/assets/js/wow.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('/soon/assets/js/main.js') }}"></script>
</body>
</html>
