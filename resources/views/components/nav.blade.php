
<nav class="p-2">
    <x-navlink href="/" :active="request()->is('/')" big="big">Home</x-navlink>
    <x-navlink href="{{ route('cats-list.index') }}" :active="request()->is('cats-list')">Cats</x-navlink>
    <x-navlink href="{{ route('about') }}" :active="request()->is('about')">About</x-navlink>

    @guest
        <x-navlink href="{{ route('login') }}" :active="request()->is('login')">Login</x-navlink>
        <x-navlink href="{{ route('register') }}" :active="request()->is('register')">Register</x-navlink>
    @endguest

    @auth
        <x-navlink href="{{ route('profile.edit') }}" :active="request()->is('profile.edit')">Profile</x-navlink>
        <x-navlink href="{{ route('cats-list.create') }}" :active="request()->is('create')">Add New Cat</x-navlink>
        <x-navlink href="{{ route('logout') }}" :active="request()->is('logout')">Logout</x-navlink>
    @endauth



</nav>


