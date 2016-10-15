<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Twist &mdash; Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FreeHTML5.co"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>
    <meta name="author" content="FreeHTML5.co"/>

<!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <style>
        #fh5co-header {
            position: absolute;
            z-index: 99;
            width: 100%;
            opacity: 1;
            top: 0;
        }
        #fh5co-header .navbar {
            padding-bottom: 0;
            margin-bottom: 0;
        }
        #fh5co-header #navbar .navbar-right {
            margin-right: 0;
            text-align: center;
        }
        @media screen and (max-width: 992px) {
            #fh5co-header #navbar .navbar-right {
                padding-bottom: 20px;
            }
        }
        #fh5co-header #navbar li a {
            font-family: "PT Sans", Arial, serif;
            color: rgba(0, 0, 0, 0.5);
            position: relative;
            font-size: 16px;
            font-weight: 400;
        }
        @media screen and (max-width: 992px) {
            #fh5co-header #navbar li a {
                padding-left: 10px !important;
                padding-right: 10px !important;
                font-size: 20px;
            }
        }
        #fh5co-header #navbar li a span {
            position: relative;
            display: block;
            padding-bottom: 2px;
        }
        #fh5co-header #navbar li a span:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -17px;
            left: 0;
            background-color: rgba(255, 255, 255, 0.5);
            visibility: hidden;
            -webkit-transform: scaleX(0);
            -moz-transform: scaleX(0);
            -ms-transform: scaleX(0);
            -o-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }
        #fh5co-header #navbar li a:hover {
            color: #000;
        }
        #fh5co-header #navbar li a:hover span:before {
            visibility: visible;
            -webkit-transform: scaleX(1);
            -moz-transform: scaleX(1);
            -ms-transform: scaleX(1);
            -o-transform: scaleX(1);
            transform: scaleX(1);
        }
        #fh5co-header #navbar li.active a {
            background: transparent;
            background: none;
        }
        @media screen and (max-width: 480px) {
            #fh5co-header #navbar li.active a {
                color: #FA5555;
            }
        }
        #fh5co-header #navbar li.active a span:before {
            visibility: visible;
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            background-color: #FA5555;
        }
        @media screen and (max-width: 480px) {
            #fh5co-header #navbar li.active a span:before {
                background-color: transparent;
            }
        }
        @media screen and (max-width: 992px) {
            #fh5co-header #navbar li.active a {
                background: transparent;
                background: none;
            }
        }
        @media screen and (max-width: 992px) and (max-width: 480px) {
            #fh5co-header #navbar li.active a {
                color: #FA5555;
            }
        }
        @media screen and (max-width: 992px) {
            #fh5co-header #navbar li.active a span {
                display: inline-block;
                color: #FA5555;
            }
            #fh5co-header #navbar li.active a span:before {
                bottom: 0;
                height: 0;
                background: transparent;
            }
        }
        #fh5co-header #navbar li.call-to-action {
            margin-left: 5px;
        }
        #fh5co-header #navbar li.call-to-action a {
            padding: 5px 10px 3px 10px;
            margin: 12px 0 0 0px;
            color: #fff;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            border-radius: 30px;
        }
        #fh5co-header #navbar li.call-to-action a:hover {
            background-color: #FA5555;
            color: #fff;
        }
        #fh5co-header #navbar li.call-to-action a span:before {
            background-color: transparent;
        }
        #fh5co-header #navbar li.call-to-action a.sign-up {
            border: 2px solid #00ADB5;
            background: #00ADB5;
        }
        #fh5co-header #navbar li.call-to-action a.sign-up:hover {
            background: #00ADB5;
            color: #fff;
        }
        #fh5co-header #navbar li.call-to-action a.log-in {
            border: 2px solid #FA5555;
            background: #FA5555;
        }
        #fh5co-header #navbar li.call-to-action a.log-in:hover {
            background: #FA5555;
            color: #fff;
        }
        #fh5co-header .navbar-brand {
            float: left;
            display: block;
            font-size: 24px;
            font-weight: 700;
            padding-left: 28px;
            color: #535659;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
        }
        #fh5co-header .navbar-brand:after, #fh5co-header .navbar-brand:before {
            content: "";
            position: absolute;
            display: block;
            width: 24px;
            height: 24px;
            background: rgba(0, 173, 181, 0.6);
            left: -12px;
            margin-left: 0px;
            bottom: 16px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        #fh5co-header .navbar-brand:before {
            left: 0px;
            background: rgba(250, 85, 85, 0.8);
        }
        #fh5co-header .navbar-brand > span {
            color: #FA5555;
        }
        @media screen and (max-width: 992px) {
            #fh5co-header .navbar-brand {
                padding-left: 55px !important;
                padding-right: 0 !important;
            }
            #fh5co-header .navbar-brand:after, #fh5co-header .navbar-brand:before {
                margin-left: 25px;
            }
        }
        #fh5co-header.navbar-fixed-top {
            position: fixed !important;
            background: #fff;
            -webkit-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
            margin-top: 0px;
            top: 0;
        }
        #fh5co-header.navbar-fixed-top .navbar-brand {
            color: #535659;
        }
        #fh5co-header.navbar-fixed-top #navbar li a {
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        #fh5co-header.navbar-fixed-top #navbar li a:hover {
            color: #FA5555;
        }
        @media screen and (max-width: 992px) {
            #fh5co-header.navbar-fixed-top #navbar li a {
                font-size: 20px;
            }
        }
        #fh5co-header.navbar-fixed-top #navbar li.active a {
            color: #FA5555 !important;
        }
        @media screen and (max-width: 768px) {
            #fh5co-header.navbar-fixed-top #navbar li.active a {
                color: #FA5555 !important;
            }
        }
        #fh5co-header.navbar-fixed-top #navbar li.active a span:before {
            visibility: visible;
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            background-color: #FA5555;
        }
        @media screen and (max-width: 768px) {
            #fh5co-header.navbar-fixed-top #navbar li.active a span:before {
                background-color: transparent;
            }
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a {
            border: 2px solid #FA5555;
            padding: 5px 10px 3px 10px;
            margin: 12px 0 0 0px;
            color: #fff;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            border-radius: 30px;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a:hover {
            background-color: #FA5555;
            color: #fff !important;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a span:before {
            background-color: transparent;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a.sign-up {
            border: 2px solid #00ADB5;
            background: #00ADB5;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a.sign-up:hover {
            background: #00ADB5;
            color: #fff;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a.log-in {
            border: 2px solid #FA5555;
            background: #FA5555;
        }
        #fh5co-header.navbar-fixed-top #navbar li.call-to-action a.log-in:hover {
            background: #FA5555;
            color: #fff;
        }
        #fh5co-header .navbar-default {
            border: transparent;
            background: #fff;
            margin: 0;
            padding-left: 50px;
            padding-right: 50px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            -ms-border-radius: 0px;
            border-radius: 0px;
        }
        @media screen and (max-width: 768px) {
            #fh5co-header .navbar-default {
                margin-top: 0px;
                padding-right: 0px;
                padding-left: 0px;
            }
        }

        #fh5co-footer {
            margin-top:3em;
            padding: 8em 1em;
        }
        #fh5co-footer {
            background: #41444B;
            color: rgba(255, 255, 255, 0.6);
        }
        #fh5co-footer a {
            color: rgba(255, 255, 255, 0.6);
        }
        #fh5co-footer a:hover {
            color: #fff !important;
            text-decoration: underline;
        }
        #fh5co-footer .section-title {
            font-size: 22px;
            color: #fff;
            position: relative;
            padding-bottom: 20px;
        }
        #fh5co-footer .copy-right {
            position: relative;
            padding-top: 20px;
            margin-top: 40px;
        }
        #fh5co-footer .copy-right > a {
            color: rgba(255, 255, 255, 0.6);
        }
        #fh5co-footer .contact-info {
            margin: 0 0 60px 0;
            padding: 0;
        }
        #fh5co-footer .contact-info li {
            font-size: 16px;
            list-style: none;
            margin: 0 0 20px 0;
            position: relative;
            padding-left: 40px;
        }
        #fh5co-footer .contact-info li i {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 22px;
            color: #00ADB5;
        }
        #fh5co-footer .social-media {
            margin: 0 0 30px 0;
            padding: 0;
        }
        #fh5co-footer .social-media li {
            display: inline-block;
            margin: 0;
            padding: 0;
            font-size: 24px;
            margin-right: 10px;
        }
        #fh5co-footer .social-media li a {
            color: #00ADB5;
        }
        #fh5co-footer .social-media li a:hover, #fh5co-footer .social-media li a:focus, #fh5co-footer .social-media li a:active {
            text-decoration: none;
        }
        #fh5co-footer .contact-form .form-group input[type="name"],
        #fh5co-footer .contact-form .form-group input[type="text"],
        #fh5co-footer .contact-form .form-group input[type="email"],
        #fh5co-footer .contact-form .form-group textarea {
            font-size: 16px;
        }
        #fh5co-footer .contact-form .form-group input[type="name"]::-webkit-input-placeholder,
        #fh5co-footer .contact-form .form-group input[type="text"]::-webkit-input-placeholder,
        #fh5co-footer .contact-form .form-group input[type="email"]::-webkit-input-placeholder,
        #fh5co-footer .contact-form .form-group textarea::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        #fh5co-footer .contact-form .form-group input[type="name"]:-moz-placeholder,
        #fh5co-footer .contact-form .form-group input[type="text"]:-moz-placeholder,
        #fh5co-footer .contact-form .form-group input[type="email"]:-moz-placeholder,
        #fh5co-footer .contact-form .form-group textarea:-moz-placeholder {
            /* Firefox 18- */
            color: rgba(255, 255, 255, 0.5);
        }
        #fh5co-footer .contact-form .form-group input[type="name"]::-moz-placeholder,
        #fh5co-footer .contact-form .form-group input[type="text"]::-moz-placeholder,
        #fh5co-footer .contact-form .form-group input[type="email"]::-moz-placeholder,
        #fh5co-footer .contact-form .form-group textarea::-moz-placeholder {
            /* Firefox 19+ */
            color: rgba(255, 255, 255, 0.5);
        }
        #fh5co-footer .contact-form .form-group input[type="name"]:-ms-input-placeholder,
        #fh5co-footer .contact-form .form-group input[type="text"]:-ms-input-placeholder,
        #fh5co-footer .contact-form .form-group input[type="email"]:-ms-input-placeholder,
        #fh5co-footer .contact-form .form-group textarea:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        #fh5co-footer .contact-form .form-group input {
            color: #fff;
            background: transparent;
            border: none;
            background: rgba(255, 255, 255, 0.05);
            box-shadow: none;
        }
        #fh5co-footer .contact-form .form-group textarea {
            color: #fff;
            background: transparent;
            border: none;
            background: rgba(255, 255, 255, 0.05);
            box-shadow: none;
        }
        #fh5co-footer #btn-submit {
            color: rgba(255, 255, 255, 0.9) !important;
            background: #FA5555 !important;
        }
        #fh5co-footer {
            padding: 5em 0;
        }
    </style>
    @stack('styles')
</head>
<body>
<header role="banner" id="fh5co-header">
    <div class="fluid-container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- Mobile Toggle Menu Button -->
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar"
                   aria-expanded="false" aria-controls="navbar"><i></i></a>
                <a class="navbar-brand" href="index.html" style="letter-spacing: 6pt;font-weight:lighter"><b
                            style="display:inline-block;transform: scale(-1, 1);">For</b><span style="">needs</span></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="{{url('/home')}}" ><span>Home</span></a></li>
                    <li class="active"><a href="#" data-nav-section="home"><span>Profile</span></a></li>
                    <li ><a data-nav-section="footer" href="#" ><span>Contact</span></a></li>


                </ul>
            </div>
        </nav>
    </div>
</header>

<section id="fh5co-home" data-section="home" style="position:relative;top:7em;">

@yield('content')
</section>


<div id="fh5co-footer"  data-section="footer" role="contentinfo">
    <div class="container" data-section="contact">
        <div class="row">
            <div class="col-md-4 to-animate">
                <h3 class="section-title">About Us</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                <p class="copy-right">&copy; 2015 Twist Free Template. <br>All Rights Reserved. <br>
                    Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
                    Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a>
                </p>
            </div>

            <div class="col-md-4 to-animate">
                <h3 class="section-title">Our Address</h3>
                <ul class="contact-info">
                    <li><i class="icon-map-marker"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
                    <li><i class="icon-phone"></i>+ 1235 2355 98</li>
                    <li><i class="icon-envelope"></i><a href="#">info@yoursite.com</a></li>
                    <li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
                </ul>
                <h3 class="section-title">Connect with Us</h3>
                <ul class="social-media">
                    <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                    <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 to-animate">
                <h3 class="section-title">Drop us a line</h3>
                <form class="contact-form">
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="message" class="sr-only">Message</label>
                        <textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Ui kit -->
<script src="js/uikit.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Owl Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Counters -->
<script src="js/jquery.countTo.js"></script>
<!-- switcher -->
<script src="js/jquery.style.switcher.js"></script>
@stack('scripts')
<script src="js/google_map.js"></script>

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>

</body>
</html>

