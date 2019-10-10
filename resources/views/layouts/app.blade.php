<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eAccount') }}</title>

    <style>

        #image-holder
        {
            width: 180px;
            height: 180px;
            background-image: url("{{ asset('images/camera.png') }}");
            margin-top: 10px;
        }

        .thumb-image
        {
            float:left;
            width:180px;
            position:relative;
            padding:5px;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        <!--Main Navigation-->
        <header>

            <!-- Navbar -->
            <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
                <div class="container-fluid">

                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                            {{--<li class="nav-item active">--}}
                                {{--<router-link class="nav-link waves-effect" to="/">Home--}}
                                    {{--<span class="sr-only">(current)</span>--}}
                                {{--</router-link>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About--}}
                                    {{--MDB</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"--}}
                                   {{--target="_blank">Free--}}
                                    {{--download</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free--}}
                                    {{--tutorials</a>--}}
                            {{--</li>--}}
                        </ul>

                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons">

                            @guest
                                <li><a class="nav-link border border-success rounded waves-effect mr-2" href="{{ URL('/') }}"><i class="fas fa-user-circle mr-2"></i>Home</a></li>
                            @else
                            <li class="nav-item">

                                <a href="{{ route('logout') }} " class="nav-link border border-success rounded waves-effect"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                                {{--<a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-success rounded waves-effect"--}}
                                   {{--target="_blank">--}}

                                {{--</a>--}}
                            </li>
                            @endguest
                        </ul>

                    </div>

                </div>
            </nav>
            <!-- Navbar -->

            <!-- Sidebar -->

            @guest
            @else
            <div class="sidebar-fixed position-fixed">

                <a class="logo-wrapper waves-effect">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid mr-2 mx-auto d-block" alt="Logo">
                    <h3 class="d-inline-block">eAccount</h3>
                </a>

                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item active waves-effect">
                        <i class="fas fa-chart-pie mr-3"></i>Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-user mr-3"></i>My Profile</a>

                    @role('admin')
                    <a href="{{ URL('/client') }}" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-table mr-3"></i>Clients
                    </a>
                    @endrole



                    {{--<a href="#" class="list-group-item list-group-item-action waves-effect">--}}
                        {{--<i class="fas fa-map mr-3"></i>Maps</a>--}}
                    {{--<a href="#" class="list-group-item list-group-item-action waves-effect">--}}
                        {{--<i class="fas fa-money-bill-alt mr-3"></i>Orders</a>--}}
                </div>

            </div>
            @endguest
            <!-- Sidebar -->

        </header>
        <!--Main Navigation-->
        <main class="pt-5 mx-lg-5">
            <div class="container-fluid mt-5">

                <!-- Heading -->
                <div class="mb-4 wow fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type="application/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function()
        {
            $("#companyLogo").on('change', function(e) {
                e.preventDefault();
                //Get count of selected files
                //console.log("Oh Yes");
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++)
                        {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script>


</body>
</html>
