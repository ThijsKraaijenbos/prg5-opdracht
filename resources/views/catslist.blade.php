<x-layout>
    <x-nav></x-nav>
    <div class="grid grid-cols-3">

        {{--        reverse om nieuwste eerst te laden --}}
        @foreach ($cats->reverse() as $cat)
            <x-cat :cat="$cat" :list="true"></x-cat>
        @endforeach

    </div>
    @if(empty($cats->all()))
        <div class="m-4 text-2xl">
            <h1 class="text-slate-50">There are currently no cats! Be the first person to add a cat with the link
                below!</h1>
            <a class="text-blue-300 underline" href="{{ route('cats-list.create') }}">Add a cat</a>
        </div>
    @endif
</x-layout>
