<html>
<head>
    <title>Cars</title>
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
@include('partials.header')
<div class="wrapper">
    <div class="container">

        @yield('content')
    </div>
</div>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
