@include('user.inc.header')
<body class="animsition">

	<!-- Header -->

@include('user.inc.navbar')

	<!-- Sidebar -->

{{-- @include('user.inc.sidebar') --}}

<div>
    @yield('body')
</div>

	<!-- Footer -->

@include('user.inc.footer')

</body>
</html>