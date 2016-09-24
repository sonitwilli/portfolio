<?php
    $baseUrl = Storage::url('public/media');
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>BCA - CMS </title>

    <meta name="description" content="BCA CMS">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/backend/img/favicon.png">
    <link rel="apple-touch-icon" href="/backend/img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="/backend/img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="/backend/img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="/backend/img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="/backend/img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="/backend/img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="/backend/img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="/backend/img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="/backend/css/bootstrap.min.css">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="/backend/css/plugins.css">
    <link rel="stylesheet" href="/backend/css/icheck/minimal/blue.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="/backend/css/main.css">

    <!-- Include a specific file here from /backend/css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="/backend/css/themes.css">
    <link rel="stylesheet" href="/backend/css/themes/flatie.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="/backend/js/vendor/modernizr-respond.min.js"></script>
</head>
<body>
<!-- Page Wrapper -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available classes:

    'page-loading'      enables page preloader
-->
<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in /backend/js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
        </div>
    </div>
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
        <!-- Alternative Sidebar -->
        <div id="sidebar-alt">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-alt-scroll">
                <!-- Sidebar Content -->
                @include('admin.page_chat')
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                @include('admin.left')
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">

            @include('admin.header')
            <!-- END Header -->

            <!-- Page content -->
            <div id="page-content">
                <!-- Dashboard Header -->
                <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                @yield('content')
                <!-- END Widgets Row -->
            </div>
            <!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                <div class="pull-right">
                    <span id="year-copy"></span> &copy; <a href="http://studioboconganh.com" target="_blank">CMS BCA</a>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in /backend/js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{!! url('admin/user/edit-profile') !!}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <fieldset>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static">{!! $user->name !!}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="{!! $user->email !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                            <div class="col-md-8">
                                <label class="switch switch-primary">
                                    <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>

<!-- END User Settings -->

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="/backend/js/helpers/excanvas.min.js"></script><![endif]-->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="/backend/js/vendor/jquery-1.12.0.min.js"></script>
<script src="/backend/js/vendor/bootstrap.min.js"></script>
<script src="/backend/js/plugins.js"></script>
<script src="/backend/js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="/backend/js/pages/index.js"></script>
<script src="/backend/js/helpers/ckeditor/ckeditor.js"></script>
<script src="/backend/js/jquery.slimscroll.min.js"></script>
<script src="/backend/js/icheck.min.js"></script>
<script src="/backend/js/helpers/jquery.price_format.2.0.min.js"></script>
@if(!empty($maps))
<script src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_KEY') !!}&libraries=places&callback=initMap" async defer></script>
@endif
<script>
    var hidden_delete = parseInt(<?=(Auth::user()->type == 2)?1:0?>);
    $("div.alert").delay(5000).slideUp();
</script>
<script src="/backend/js/main.js"></script>
</body>
</html>