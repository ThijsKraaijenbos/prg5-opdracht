<x-layout>
    <x-nav></x-nav>


    @foreach ($cats->reverse() as $cat)
        <x-cat-admin :cat="$cat"></x-cat-admin>
    @endforeach
</x-layout>
