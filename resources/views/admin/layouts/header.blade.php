<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="description" content="JSK">
    <title>
        @section('title') @show - {{ config('app.name') }}
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('/media/img/souvnear-logo.svg') }}" type="image/x-icon" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/chosen.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{-- @notifyCss --}}
    @yield('header_styles')
    <style type="text/css">
        .show-notify .notify.fixed.inset-0 {
            margin-top: 41px;
        }
    </style>
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="">{{ config('app.name') }}</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <div class="app-nav__item text-capitalize">
            <span><img src="{{ asset('assets/images/5d4b49f4.png') }}" alt="wave-hand" width="22"
                    height="22"></span>
            <span>
                Welcome, {{ Auth::user()->full_name }}!
            </span>
        </div>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">

            {{-- <li class="app-search" style="visibility: hidden;">
               <input class="app-search__input" type="search" placeholder="Search">
               <button class="app-search__button"><i class="fa fa-search"></i></button>
            </li>
            <!--Notification Menu--> --}}
            <li><a class="app-nav__item" href="{{ url('/') }}"><i class="fa fa-home fa-lg"></i> Go to main site</a>
            </li>
            <?php if (Auth::check()) { $notifications = auth()->user()->unreadNotifications; ?>
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i><sup
                        class="notifys">{{ count($notifications) }}</sup></a>
                <ul class="app-notification dropdown-menu dropdown-menu-right">

                    <li class="app-notification__title">You have {{ count($notifications) }} new notifications.</li>
                    <?php $k = 1; ?>
                    @forelse($notifications as $notification)
                        <?php if($k <= 4) { ?>
                        <div class="app-notification__content" id="hide{{ $notification->id }}">
                            <li><a class="app-notification__item" href="javascript:void(0)"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-bell-o fa-lg fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message"> [{{ $notification->created_at }}] User
                                            {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has
                                            registered.</p>
                                        <p class="app-notification__metas mark-as-read"
                                            data-id="{{ $notification->id }}" style="color:blue; !important">
                                            Mark as read
                                        </p>
                                    </div>
                                </a></li>

                        </div>
                        <?php $k++; } ?>
                    @empty
                        <p class="text-center">There are no new notifications</p>
                    @endforelse

                    </div>
                    <?php if(count($notifications) >= 4) { ?>
                    <li class="app-notification__footer"><a href="{{ url('admin/notify') }}">See all notifications.</a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <?php } ?>
            <!-- User Menu-->

            <li><a class="app-nav__item" href="<?php echo URL::to('/logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            {{-- <li class="dropdown">
               <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
               <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> Profile</a></li>
               </ul>
            </li> --}}
        </ul>
    </header>
