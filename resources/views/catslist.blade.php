<x-layout>
    <x-nav></x-nav>

    @foreach ($cats as $cat)
        <x-cat :cat="$cat" :list="true"></x-cat>
    @endforeach
</x-layout>
