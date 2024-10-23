<x-layout>
    <x-nav></x-nav>
    <div class="grid grid-cols-3">
    @foreach ($cats as $cat)
            <x-cat :cat="$cat" :list="true"></x-cat>
    @endforeach
    </div>
</x-layout>
