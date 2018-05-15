<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>StaffApp Console @yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>
<!-- Bootstrap -->
{{Html::style('css/bootstrap.min.css')}}
{{-- <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"> --}}
{{Html::style('css/style.css')}}

@yield('stylesheets')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
