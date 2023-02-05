<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dent App') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased ">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{route('none.panel')}}" class="flex items-center">
                                <img class="h-8 w-auto" src="https://www.w3.org/wiki/images/f/f4/PushBackDataToLegacySourcesUseCases%24pb-logo-100x100.png" alt="Dent App">
                                Dent Project
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-center">
                                <a href="http://localhost:8000/" class="px-3 py-2 rounded]
                                md text-sm font-medium leading-5 text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 focus:border-gray-300 focus:border-opacity-50 transition duration-150 ease-in-out">
                                    Home
                                </a>
                                <a href="{{route('none.about')}}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 focus:border-gray-300 focus:border-opacity-50 transition duration-150 ease-in-out">
                                    About
                                </a>
                                <a href="{{route('services')}}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 focus:border-gray-300 focus:border-opacity-50 transition duration-150 ease-in-out">
                                    Services
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>






