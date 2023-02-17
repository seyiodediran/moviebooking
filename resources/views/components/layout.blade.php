<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moviebooking</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .hamburger {
            cursor: pointer;
            width: 24px;
            height: 24px;
            transition: all 0.25s;
            position: relative;
        }

        .hamburger-top,
        .hamburger-middle,
        .hamburger-bottom {
            position: absolute;
            top: 0;
            left: 0;
            width: 24px;
            height: 2px;
            background: #000;
            transform: rotate(0);
            transition: all 0.5s;
        }

        .hamburger-middle {
            transform: translateY(7px);
        }

        .hamburger-bottom {
            transform: translateY(14px);
        }

        .open {
            transform: rotate(90deg);
            transform: translateY(0px);
        }

        .open .hamburger-top {
            transform: rotate(45deg) translateY(6px) translate(6px);
        }

        .open .hamburger-middle {
            display: none;
        }

        .open .hamburger-bottom {
            transform: rotate(-45deg) translateY(6px) translate(-6px);
        }
    </style>
</head>

<body>

    {{-- <button><a href="movies/create">Add movie</a></button> --}}
    <x-flash-message />
    <header class="font-sans">
        <div class="container mx-auto p-4 z-50">
            <nav class="flex flex-row items-center justify-between max-h-sm ">
                <a class="flex flex-row font-bold inline mr-4 text-4xl uppercase text-white basis-1/4"
                    href="/">FilmBooking<div class="text-red-500 text-5xl">.</div>
                </a>
                <div class="main-menu w-full hidden lg:w-auto flex flex-row basis-1/2 md:block">
                    <ul class="flex flex-row  mx-auto w-full">
                        <div class="inline  w-full flex">
                            <li><a class="p-3 inline text-white" href="javascript:void(0);">Home</a></li>
                            <li><a class="p-3 inline text-white" href="javascript:void(0);">About</a></li>
                            <li><a class="p-3 inline text-white" href="javascript:void(0);">Contact</a></li>
                        </div>
                        <div class=" w-full flex justify-end">
                            @auth
                                <li>
                                    <span class="font-bold uppercase text-white">
                                        Welcome {{ auth()->user()->name }}
                                    </span>
                                </li>
                                <form action="/logout" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 pl-4">
                                        Logout
                                    </button>
                                </form>
                            @else
                                {{-- <li><a class="p-3 text-blue-500 font-bold" href="/register">Register</a></li> --}}
                                <li class="w-full text-right"><a class="p-3 text-blue-500 font-bold "
                                        href="/login">Login</a></li>
                            @endauth
                        </div>
                    </ul>
                </div>


                <div class="social-icon w-full basis-1/4 lg:w-auto flex flex-row justify-end hidden md:block">
                    @if (auth()->check() &&
                            auth()->user()->isAdmin())
                        <div class="flex items-center pr-8">
                            <a href="/movies/manage" class="text-blue-200 hover:underline">See Listings</a>
                        </div>
                        <button type="button"
                            class="inline-block rounded-full bg-blue-600 text-white leading-normal uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9">
                            <a href="movies/create">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                        </button>
                    @else
                        <div class="">
                            @include('partials._search')
                        </div>
                    @endif
                </div>

                {{-- Hamburger icon --}}
                <div class="md:hidden">
                    <button class="navbar-burger flex items-center text-slate-600 p-3">
                        <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Mobile menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>

                {{-- Hamburger menu  --}}
                <div class="navbar-menu relative z-50 hidden">
                    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
                    <nav
                        class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-slate-900 border-r overflow-y-auto">
                        <div class="flex items-center mb-8">
                            <a class="flex flex-row font-bold inline mr-4 text-2xl uppercase text-white basis-1/4"
                                href="/">FilmBooking<div class="text-red-500 text-3xl">.</div>
                            </a>
                            <button class="navbar-close">
                                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <ul>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-slate-500 hover:text-gray-200 rounded"
                                        href="/">Home</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-slate-500 hover:text-gray-200 rounded"
                                        href="#">About Us</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-slate-500 hover:text-gray-200 rounded"
                                        href="#">Services</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-slate-500 hover:text-gray-200 rounded"
                                        href="#">Pricing</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-slate-500 hover:text-gray-200 rounded"
                                        href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-auto">
                            <div class="pt-6">
                                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                                    href="/login">Sign in</a>
                                <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl"
                                    href="/register">Sign Up</a>
                            </div>
                        </div>
                    </nav>
                </div>
        </div>




        </nav>


        </div>
    </header>

    {{ $slot }}

    {{-- FOOTER  --}}

    <!-- component -->
    <!-- This is an example component -->
    <div class="w-full mx-auto">

        <footer class="p-4 rounded-lg shadow md:flex md:items-center md:justify-around md:p-6 bg-slate-900">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a
                    href="https://flowbite.com" class="hover:underline" target="_blank">Flowbite™</a>. All Rights
                Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 sm:mt-0">
                <li>
                    <a href="#"
                        class="mr-4 text-sm text-gray-500 hover:underline md:mr-6 dark:text-gray-400">About</a>
                </li>
                <li>
                    <a href="#"
                        class="mr-4 text-sm text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Privacy
                        Policy</a>
                </li>
                <li>
                    <a href="#"
                        class="mr-4 text-sm text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Licensing</a>
                </li>
                <li>
                    <a href="#" class="text-sm text-gray-500 hover:underline dark:text-gray-400">Contact</a>
                </li>
            </ul>
        </footer>
    </div>
</body>

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>

</html>
