<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/stylewelcome.css') }}">
    </head>
    <body>
            <div class="welcome">
                <h1 data-text="Welcome">Welcome</h1>
            </div>
            @if (Route::has('login'))
                <div class="cn">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="button1">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button2">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button3">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </body>
</html>
