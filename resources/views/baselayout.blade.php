@include('partials.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('partials.navbar')

@include('partials.sidebar')

@yield('content')

@include('partials.scripts')