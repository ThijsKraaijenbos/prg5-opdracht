<link href="{{ asset('css/app.css') }}">
<nav>
    <x-navlink href="/" :active="request()->is('/')">Home</x-navlink>
    <x-navlink href="{{ route('about') }}" :active="request()->is('about')">About</x-navlink>
    <x-navlink href="{{ route('login') }}" :active="request()->is('login')">Login</x-navlink>
    <x-navlink href="{{ route('register') }}" :active="request()->is('register')">Register</x-navlink>
</nav>


