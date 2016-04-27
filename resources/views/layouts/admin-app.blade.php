<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - 后台管理 - 天美农业</title>

    <link rel="icon" href="/images/logo.png">
    <link rel="shortcut icon" href="/images/logo.png">
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/summernote/0.8.1/summernote.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

    @include('layouts.nav')

    <div class="container">

        @if(Auth::check())
        <div class="col-md-2">
            @include('layouts.nav_sidebar')
        </div>
        <div class="col-md-10">
            @include('admin.partials.breadcrumb')
            @yield('content')
        </div>
        @else
            <div class="row">
                @yield('content')
            </div>
        @endif
    </div>

    <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/2.1.2/toastr.min.js"></script>
    <script src="//cdn.bootcss.com/summernote/0.8.1/summernote.min.js"></script>
    <script src="//cdn.bootcss.com/summernote/0.8.1/lang/summernote-zh-CN.min.js"></script>
    <script src="//cdn.bootcss.com/select2/4.0.2-rc.1/js/select2.min.js"></script>
    <script src="/js/admin.js"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if(session()->has('status'))
            toastr['{{ session('status') == 'error' ? 'error' : 'success' }}']('{{ session('message') }}');
        @endif
    </script>
    @stack('scripts.footer')
</body>
</html>