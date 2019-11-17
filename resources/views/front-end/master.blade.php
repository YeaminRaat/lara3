
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('/front-end')}}/img/favicon.png" type="image/png" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/linericon/style.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/flaticon.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('/front-end')}}/css/responsive.css" />
</head>

<body>
<!--================Header Menu Area =================-->
@include('front-end.includes.header')
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
@yield('main-body')
<!--================ End Blog Area =================-->

<!--================ start footer Area  =================-->
@include('front-end.includes.footer')
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/front-end')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/front-end')}}/js/popper.js"></script>
<script src="{{asset('/front-end')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/front-end')}}/js/stellar.js"></script>
<script src="{{asset('/front-end')}}/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/isotope/isotope-min.js"></script>
<script src="{{asset('/front-end')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/front-end')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/front-end')}}/vendors/counter-up/jquery.counterup.js"></script>
<script src="{{asset('/front-end')}}/js/mail-script.js"></script>
<script src="{{asset('/front-end')}}/js/theme.js"></script>
</body>

</html>
