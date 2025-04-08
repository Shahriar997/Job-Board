<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Job Board</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="mx-auto mt-10 max-w-2xl text-slate-700 bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100">
        <nav class="mb-8 flex justify-between text-lg font-medium">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>

            <ul class="flex space-x-2">
                <li>
                    @auth
                        <li>
                           <a href="{{route('my-job-application.index')}}">
                                {{ auth()->user()->name ?? 'Anonymous' }} : Applications
                           </a>
                        </li>
                        <li>
                            <form action="{{ route('auth.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Logout</button>
                            </form>
                        </li>
                        @else
                        <a href="{{ route('auth.create') }}">Sign in</a>
                    @endauth
                </li>
            </ul>
        </nav>

        @if (@session('success'))
            <div 
                class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{ $slot }}
    </body>
</html>
