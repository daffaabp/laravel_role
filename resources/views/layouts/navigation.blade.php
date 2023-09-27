{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}


@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="../vendor/chart.js/Chart.min.css">
@endpush

@section('content')
    <div class="main-content">
        <div class="title">
            Dashboard
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Monthly Sales</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="642" width="1388"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                        </div>
                        <div class="card-body">
                            <div class="progress-wrapper">
                                <h4>Progress 25%</h4>
                                <div class="progress progress-bar-small">
                                    <div class="progress-bar progress-bar-small" style="width: 25%" role="progressbar"
                                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <h4>Progress 45%</h4>
                                <div class="progress progress-bar-small">
                                    <div class="progress-bar progress-bar-small bg-pink" style="width: 45%"
                                        role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <canvas id="myChart2" height="842" width="1388"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header-statistics">
                            <h5>Monthly Statistics</h5>
                            <p>Based On Major Browser</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table small-font table-striped table-hover table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Google Chrome</td>
                                            <td>5120</td>
                                            <td><i class="fa fa-caret-up text-success"></i></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mozilla Firefox</td>
                                            <td>4000</td>
                                            <td><i class="fa fa-caret-up text-success"></i></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Safari</td>
                                            <td>8800</td>
                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Opera Mini</td>
                                            <td>4123</td>
                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Interest</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3" height="842" width="1388"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-4">
                    <div class="card">
                        <!-- <div class="float-label">
                            <h6>Sales</h6>
                            <h4>$1500</h4>
                        </div> -->
                        <div class="card-body">
                            <div id="apex-chart"></div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <!-- <div class="float-label">
                            <h6>Profit</h6>
                            <h4>$500</h4>
                        </div> -->
                        <span></span>

                        <div class="card-body">
                            <div id="apex-chart-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="timeline-xs">
                                <li class="timeline-item success">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            2 minutes ago
                                        </div>
                                        <p>
                                            <a class="text-info" href="">
                                                Bambang
                                            </a>
                                            has completed his account.
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            12:30
                                        </div>
                                        <p>
                                            Staff Meeting
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item danger">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            11:11
                                        </div>
                                        <p>
                                            Completed new layout.
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item info">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            Thu, 12 Jun
                                        </div>
                                        <p>
                                            Contacted
                                            <a class="text-info" href="">
                                                Microsoft
                                            </a>
                                            for license upgrades.
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            Tue, 10 Jun
                                        </div>
                                        <p>
                                            Started development new site
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            Sun, 11 Apr
                                        </div>
                                        <p>
                                            Lunch with
                                            <a class="text-info" href="">
                                                Mba Inem
                                            </a>
                                            .
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-item warning">
                                    <div class="margin-left-15">
                                        <div class="text-muted text-small">
                                            Wed, 25 Mar
                                        </div>
                                        <p>
                                            server Maintenance.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chat</h4>
                        </div>
                        <div class="card-body small-padding">
                            <div class="panel-discussion ps-chat">
                                <ol class="discussion">
                                    <li class="messages-date">
                                        Sunday, Feb 9, 12:58
                                    </li>
                                    <li class="self">
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                Hi, Mba Inem
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                How are you?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="other">
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                Hi, i am good
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar2.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="self">
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                Glad to see you ;)
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="messages-date">
                                        Sunday, Feb 9, 13:10
                                    </li>
                                    <li class="other">
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                What do you think about my new Dashboard?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar2.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="messages-date">
                                        Sunday, Feb 9, 15:28
                                    </li>
                                    <li class="other">
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                Alo...
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar2.png" alt="">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                Are you there?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar2.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="self">
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                Hi, i am here
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                Your Dashboard is great
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="messages-date">
                                        Friday, Feb 7, 23:39
                                    </li>
                                    <li class="other">
                                        <div class="message">
                                            <div class="message-name">
                                                Mba Inem
                                            </div>
                                            <div class="message-text">
                                                How does the binding and digesting work in ReactJS?, Bang?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar2.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="self">
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                oh that's your question?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                little reduntant, no?
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message-name">
                                                Mas Bambang
                                            </div>
                                            <div class="message-text">
                                                literally we get the question daily
                                            </div>
                                            <div class="message-avatar">
                                                <img src="../assets/images/avatar1.png" alt="">
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="message-bar">
                                <div class="message-inner">
                                    <a class="link icon-only" href="#"><i class="fa fa-camera"></i></a>
                                    <div class="message-area">
                                        <textarea placeholder="Message"></textarea>
                                    </div>
                                    <a class="link" href="#">
                                        Send
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('js')
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/pages/index.min.js"></script>
@endpush
