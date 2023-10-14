<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <!-- Scripts -->
    @routes
</head>
<body class="font-sans antialiased">
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <label for="name" class="block font-medium text-gray-700">Name</label>
        <input id="name" type="text" class="block mt-1 w-full" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <label for="email" class="block font-medium text-gray-700">Email</label>
        <input id="email" type="email" class="block mt-1 w-full" name="email" value="{{ old('email') }}" required autocomplete="username">
        @error('email')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" class="block font-medium text-gray-700">Password</label>
        <input id="password" type="password" class="block mt-1 w-full" name="password" required autocomplete="new-password">
        @error('password')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password</label>
        <input id="password_confirmation" type="password" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password">
        @error('password_confirmation')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            Already registered?
        </a>

        <button type="submit" class="ml-4 py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 active:bg-indigo-800">
            Register
        </button>
    </div>
</form>
</body>
</html>
