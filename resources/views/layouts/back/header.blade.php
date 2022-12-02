<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title> @yield('title','NAİK | Yönetim Paneli') </title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('tema/public/')}}/assets/img/favicons/32favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('tema/public/')}}/assets/img/favicons/32favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('tema/public/')}}/assets/img/favicons/32favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('tema/public/')}}/assets/img/favicons/32favicon.png">
    <link rel="manifest" href="{{asset('tema/public/')}}/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="{{asset('tema/public/')}}/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <script src="{{asset('tema/public/')}}/assets/js/config.js"></script>
    <script src="{{asset('tema/public/')}}/vendors/simplebar/simplebar.min.js"></script>

    <!--datatable-->

    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('tema/public/')}}/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="{{asset('tema/public/')}}/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('tema/public/')}}/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="{{asset('tema/public/')}}/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('tema/public/')}}/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    @yield('css')
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>
