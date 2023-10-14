<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Inclure votre fichier CSS externe ici -->
    <link rel="stylesheet" href="{{ asset('votre-stylesheet.css') }}">
</head>
<body class="font-sans antialiased">
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    <div>
        <label for="is_director" class="block text-sm font-medium text-gray-700">Êtes-vous directeur d'une association ?</label>
        <input type="checkbox" id="is_director" name="is_director" class="mt-1">
    </div>
    <div>
        <a href="{{ route('login') }}">Already registered?</a>
        <button type="submit">Register</button>
    </div>
</form>
</body>
</html>
