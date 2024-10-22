<nav class="p-2 flex flex-row items-start">
    <x-navlink href="/" :active="request()->is('/')" big="big">Home</x-navlink>
    <x-navlink href="{{ route('cats-list.index') }}" :active="request()->is('cats') || request()->is('cats/*' && !request()->is('cats/create'))">Cats</x-navlink>
    <x-navlink href="{{ route('about') }}" :active="request()->is('about')">About</x-navlink>

    @guest
        <x-navlink href="{{ route('login') }}" :active="request()->is('login')">Login</x-navlink>
        <x-navlink href="{{ route('register') }}" :active="request()->is('register')">Register</x-navlink>
    @endguest

    @auth
        <x-navlink href="{{ route('profile.edit') }}" :active="request()->is('profile.edit')">Profile</x-navlink>
        <x-navlink href="{{ route('cats-list.create') }}" :active="request()->is('cats/create')">Add New Cat</x-navlink>
        @if(strtolower(auth()->user()->role) === "admin")
            <x-navlink href="{{ route('admin.index') }}" :active="request()->is('admin')">Admin Panel</x-navlink>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-blue-100 px-4 py-1 rounded-xl m-2" type="submit">{{ __('Log Out') }}</button>
        </form>
    @endauth



</nav>


