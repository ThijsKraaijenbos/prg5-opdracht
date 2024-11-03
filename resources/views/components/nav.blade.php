<nav class="p-2 flex flex-row justify-between max-h-min items-center">
    <div class="flex flex-row items-center">
        <x-navlink href="{{ route('home') }}" :active="request()->is('/') || request()->is('home')">Home</x-navlink>
        <x-navlink href="{{ route('cats-list.index') }}"
                   :active="request()->is('cats') || request()->is('cats/*' && !request()->is('cats/create'))">Cats
        </x-navlink>
        <x-navlink href="{{ route('about') }}" :active="request()->is('about')">About</x-navlink>
        @auth
            <x-navlink href="{{ route('cats-list.create') }}" :active="request()->is('cats/create')">Add New Cat
            </x-navlink>
        @endauth
    </div>

    <div class="flex flex-row items-center">
        @guest
            <x-navlink href="{{ route('login') }}" :active="request()->is('login')">Login</x-navlink>
            <x-navlink href="{{ route('register') }}" :active="request()->is('register')">Register</x-navlink>
        @endguest

        @auth
            @if(strtolower(auth()->user()->role) === "admin")
                <x-navlink href="{{ route('admin.index') }}" :active="request()->is('admin')">Admin Panel</x-navlink>
            @endif
            <x-navlink class="flex flex-row gap-2" href="{{ route('profile.edit') }}"
                       :active="request()->is('profile')">
                <img src="data:image/webp;base64,{{ auth()->user()->image }}" alt="Image of {{auth()->user()->name}}"
                     class="h-6 w-6 rounded-full"/>
                Profile
            </x-navlink>
            <form class="m-0" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-blue-100 px-4 py-1 rounded-xl m-2" type="submit">{{ __('Log Out') }}</button>
            </form>
        @endauth
    </div>

</nav>


