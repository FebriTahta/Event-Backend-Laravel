<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/assets/img/basic/favicon.ico') }}" type="image/x-icon">
    <title>- Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSS -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('assets/assets/css/app.css') }}">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>
        (function(w, d, u) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p(x, y) {
                if (x == "ready") {
                    w.bindReadyQ.push(y);
                } else {
                    w.readyQ.push(x);
                }
            };
            var a = {
                ready: p,
                bind: p
            };
            w.$ = w.jQuery = function(f) {
                if (f === d || f === u) {
                    return a
                } else {
                    p(f)
                }
            }
        })(window, document)
    </script>
</head>

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
            <section class="sidebar">
                <div class="w-80px mt-3 mb-3 ml-3">
                    <img src="{{ asset('logo-crop.png') }}" alt="">
                </div>
                <div class="relative">
                    <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                        aria-controls="userSettingsCollapse"
                        class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                        <i class="icon icon-cogs"></i>
                    </a>
                    <div class="user-panel p-3 light mb-2">
                        <div>
                            <div class="float-left image">
                                <img class="user_avatar" src="{{ asset('assets/assets/img/dummy/u2.png') }}"
                                    alt="User Image">
                            </div>
                            <div class="float-left info">
                                <h6 class="font-weight-light mt-2 mb-1 text-capitalize">{{ auth()->user()->username }}</h6>
                                <a href="#" class="text-capitalize"><i class="icon-circle text-primary blink "></i> {{ auth()->user()->role }}</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="collapse multi-collapse" id="userSettingsCollapse">
                            <div class="list-group mt-3 shadow">            
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="list-group-item list-group-item-action"><i
                                        class="mr-2 icon-security text-purple"></i>Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header"><strong>NAVIGATION</strong></li>
                    <li class="treeview"><a href="#">
                            <i class="icon icon icon-package blue-text s-18"></i>
                            <span>Dashboard</span>
                            {{-- <span class="badge r-3 badge-primary pull-right">4</span> --}}
                        </a>
                    </li>
                    <li class="treeview"><a href="#"><i
                                class="icon icon-account_box light-green-text s-18"></i>Users<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="/backend-user"><i class="icon icon-circle-o"></i>All Users</a>
                            </li>
                            <li><a href="/backend-create-user"><i class="icon icon-add"></i>Add User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="header light mt-3"><strong>COMPONENTS</strong></li>

                    <li class="treeview ">
                        <a href="#">
                            <i class="icon icon-wpforms light-green-text s-18 "></i> <span>Manajemen Event /
                                Lomba</span>
                            <i class="icon icon-angle-left s-18 pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/backend-event"><i class="icon icon-wpforms light-green-text"></i>Event /
                                    Lomba</a>
                            </li>
                            <li><a href="/backend-kategori"><i
                                        class="icon icon-wpforms light-green-text"></i>Kategori</a>
                            </li>
                        </ul>
                    </li>

                    



                    <li class="header light mt-3"><strong>BLOG</strong></li>
                    <li class="treeview ">
                        <a href="#">
                            <i class="icon icon icon-newspaper blue-text s-18 "></i> <span>&nbsp;Manajemen Blog</span>
                            <i class="icon icon-angle-left s-18 pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="/backend-blog"><i class="icon icon-folders2 blue-text"></i>Daftar Blog</a>
                            </li>
                            <li><a href="/backend-blog-create"><i class="icon icon-plus blue-text"></i>Add New Blog</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </section>
        </aside>
        <!--Sidebar End-->
        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50"
                                type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation"
                            class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
            <div class="sticky">
                <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
                    <div class="relative">
                        <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
