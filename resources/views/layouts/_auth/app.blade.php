<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- todo: css/script -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/my-auth/css/auth.css') }}">
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        <!-- todo: show content title-->
                                        @yield('title')
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <!-- todo: show main content -->
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <!-- todo: show footer -->
            @include('layouts._auth.footer')
        </div>
    </div>
    <!-- todo: script -->
    <!-- jquery -->
    <script src="{{ asset('vendor/dashboard/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap bundle -->
    <script src="{{ asset('vendor/dashboard/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/dashboard/my-auth/js/auth.js') }}"></script>
</body>

</html>
