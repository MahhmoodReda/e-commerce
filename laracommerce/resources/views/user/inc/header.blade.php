<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keyword')">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('user/images') }}/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/fonts') }}/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/fonts') }}/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/fonts') }}/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/vendor') }}/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css') }}/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css') }}/main.css">
<!--===============================================================================================-->
<!-- include the style -->
<link rel="stylesheet" href="{PATH}/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="{PATH}/css/themes/default.min.css" />
@livewireStyles
</head>