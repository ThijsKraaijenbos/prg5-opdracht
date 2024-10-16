<x-layout>
    <x-nav></x-nav>
    @foreach ($cats as $cat)
        <x-cat :cat="$cat"></x-cat>
    @endforeach
</x-layout>
