<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BASE</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/bundles/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">



    <!-- Custom style CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/bundles/fullcalendar/fullcalendar.min.css') }}"> --}}
    @livewireStyles


</head>

<body>

    {{-- header --}}
    <?php $access = session()->get('Controls'); ?>

    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                                <i data-feather="align-justify"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">


                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title text-sm">
                                {{ Auth::user()->name }}

                            </div>

                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/dashboard">
                            <span class="logo-name">Logistic Express</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="dropdown">
                            <a href="" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="monitor"></i><span>Categories</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/category">Category</a></li>
                                <li><a class="nav-link" href="/sub-category">Sub Category </a></li>


                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="/size">
                                <i data-feather="command"></i><span>Size</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="/delivery-type">
                                <i data-feather="truck"></i><span>Delivery Type</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="/employee">
                                <i data-feather="command"></i><span>Employee</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="/customer">
                                <i data-feather="users"></i><span>Customer</span>
                            </a>
                        </li>


                        <li class="dropdown">
                            <a href="/goods">
                                <i data-feather="box"></i><span>Goods</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="/contactus">
                                <i data-feather="command"></i><span>Contact Us</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="/reviews">
                                <i data-feather="command"></i><span>Reviews</span>
                            </a>
                        </li>


                        {{-- admin --}}
                        @if (in_array('access-model', $access)||in_array('user-type', $access) || in_array('users', $access))
                        <li class="menu-header">ADMINSTRITION</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="user-check"></i><span>Auth</span>
                            </a>
                            <ul class="dropdown-menu">
                                @if (in_array('access-model', $access))
                                <li><a href="/access-model">Access-Model</a></li>
                                @endif

                                @if (in_array('user-type', $access))
                                <li><a href="/user-type">User-Types</a></li>
                                @endif

                                @if (in_array('users', $access))
                                <li><a href="/users">User</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            {{-- <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->
                        {{ $slot }}
        </div>
        </section>
    </div> --}}

    <!-- Main Content -->
    <div class="main-content">

        <!-- add content here -->
        {{ $slot }}


    </div>



    </div>



    <footer class="main-footer">
        <div class="footer-left">
            <a href="https://nisharu-portfolio.netlify.app/">Nisharughaan Paramajothy</a></a>
        </div>
        <div class="footer-right">
        </div>
    </footer>

    @yield('model')
    </div>
    </div>
    {{-- end header --}}
    @livewireScripts
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/advance-table.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script> --}}


    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/bundles/fullcalendar/fullcalendar.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script>
        // this is for insert
        window.addEventListener('insert-show-form', event => {
            $('#insert-model').modal('show');
        });
        window.addEventListener('insert-hide-form', event => {
            $('#insert-model').modal('hide');
        });

        // this is for delete
        window.addEventListener('delete-show-form', event => {
            $('#delete-model').modal('show');
        });
        window.addEventListener('delete-hide-form', event => {
            $('#delete-model').modal('hide');
        });

    </script>
</body>

</html>
