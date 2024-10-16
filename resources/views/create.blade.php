<x-layout>
    <x-nav></x-nav>

    <form method="post" action="{{route('cats-list.store')}}" class="flex flex-col max-w-80">
        @csrf
        <x-input-label for="name">Name</x-input-label>
        <x-text-input type="text" name="name" id="name"/>

        <x-input-label for="description">Description</x-input-label>
        <x-text-input type="text" name="description" id="description"/>

        <x-input-label for="image">Image</x-input-label>
        <x-text-input type="text" name="image" id="image"/>

        <x-primary-button type="submit">Create</x-primary-button>
    </form>
</x-layout>
