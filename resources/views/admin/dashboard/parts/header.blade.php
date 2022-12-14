<?php $notifications = auth()->user()->unreadNotifications ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>

<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="{{route('home')}}" class="logo">
               Laravel Shop
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">

                <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                    <div class="input-group">
                        <input type="text" placeholder="Search ..." class="form-control">
                        <div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
{{--                    <li class="nav-item dropdown hidden-caret">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="la la-envelope"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-bell"></i>
                            <span class="notification">{{$notifications->count()}}</span>
                        </a>
                        <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                            <li>
                                <div class="dropdown-title">You have {{$notifications->count()}} new notification</div>
                            </li>
                            <li>
                                <div class="notif-center">
                                    @foreach ($notifications as $notification)
                                        <form method="post" action="{{route('admin.markNotification')}}">
                                            @csrf
                                        <a href="#" class="closeNotification">
                                            <div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
                                            <div class="notif-content">
												<span class="block">
													{{$notification->data['name']}}
												</span>
                                                <span class="time">New order</span>
                                            </div>
                                            <input name="id" value="{{$notification->id}}" hidden>
                                            <button type="submit" style="z-index:999">Ok</button>
                                        </a>
                                        </form>
                                    @endforeach


                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{asset('assets/img/profile.jpg')}}" alt="user-img" width="36" class="img-circle"><span >{{auth()->user()->name}}</span></span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="{{asset('assets/img/profile.jpg')}}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{auth()->user()->name}}</h4>
                                        <p class="text-muted">{{auth()->user()->email}}</p></div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
{{--                            <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>--}}
{{--                            <a class="dropdown-item" href="#"></i> My Balance</a>--}}
{{--                            <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('assets/img/profile.jpg')}}">
                </div>
                <div class="info">
                    <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{auth()->user()->name}}
									<span class="user-level">{{auth()->user()->role->name}}</span>
									<span class="caret"></span>
								</span>
                    </a>
                    <div class="clearfix"></div>

{{--                    <div class="collapse in" id="collapseExample" aria-expanded="true" style="">--}}
{{--                        <ul class="nav">--}}
{{--                            <li>--}}
{{--                                <a href="#profile">--}}
{{--                                    <span class="link-collapse">My Profile</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#edit">--}}
{{--                                    <span class="link-collapse">Edit Profile</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#settings">--}}
{{--                                    <span class="link-collapse">Settings</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="la la-dashboard"></i>
                        <p>Dashboard</p>

                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenu1" data-toggle="dropdown">
                        <i class="la la-table"></i> Products
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="{{route('admin.products.index')}}">All products</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.products.create')}}">Create product</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenu1" data-toggle="dropdown">
                        <i class="la la-table"></i> Categories
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="{{route('admin.categories.index')}}">All categories</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.categories.create')}}">Create category</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders')}}">
                        <i class="la la-dashboard"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.notifications')}}">
                        <i class="la la-bell"></i>
                        <p>Notifications</p>
                        <span class="notification" style="color: red">{{$notifications->count()}}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenu1" data-toggle="dropdown">
                        <i class="la la-table"></i> Promocodes
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="{{route('admin.promocodes.index')}}">All promocodes</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.promocodes.create')}}">Create promocode</a></li>
                    </ul>
                </li>


                <li class="nav-item update-pro">
                    <a href="{{route('home')}}">
                        <button  data-toggle="modal" data-target="#modalUpdate">
                            <i class="la la-hand-pointer-o"></i>
                            <p>Back to site</p>
                        </button>
                    </a>
                </li>

            </ul>
        </div>
    </div>

