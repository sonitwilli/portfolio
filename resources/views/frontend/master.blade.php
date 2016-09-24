<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/frontend/img/gravicon.png">
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keywords" content="{{ $setting->keywords }}">
    <meta name="title" content="@yield('title')">
    <meta name="author" content="Son Bui">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/frontend/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/frontend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">


@include('frontend.block.header')

@yield('content')

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

@include('frontend.pages.port_modal')


<!-- jQuery -->
<script src="/frontend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/frontend/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/frontend/js/classie.js"></script>
<script src="/frontend/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="/frontend/js/jqBootstrapValidation.js"></script>
<script src="/frontend/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/frontend/js/freelancer.js"></script>


</body>
</html>