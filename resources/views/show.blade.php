<x-layout pagename="Details page for {{$cat->name}}">
    <x-nav></x-nav>

    <x-cat :cat="$cat"></x-cat>

</x-layout>
