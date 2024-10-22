<x-layout>
    <x-nav></x-nav>

    @foreach ($cats as $cat)
        @if($cat->active)
            <x-cat :cat="$cat" :list="true"></x-cat>
        @endif
    @endforeach
</x-layout>
