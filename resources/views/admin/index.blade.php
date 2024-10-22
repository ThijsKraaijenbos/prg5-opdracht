<x-layout>
    <x-nav></x-nav>


    @foreach ($cats as $cat)
        <x-cat-admin :cat="$cat"></x-cat-admin>
    @endforeach
</x-layout>
