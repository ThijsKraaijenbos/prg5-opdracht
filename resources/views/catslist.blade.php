<x-layout pagename="List of all cats">
    <x-nav></x-nav>
    @if (session('success'))
        <h1 class='m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-row justify-between relative w-max'>{{ session('success') }}</h1>
    @endif
    <form method="GET" action="{{ route('cats-list.search')}}" class="flex items-end">
        <div class="ml-5">
            <x-input-label for="tags">Tags</x-input-label>
            <select name="tags[]" id="tags[]" multiple=""
                    class="min-h-50 max-h-50 flex flex-col cc-2 bg-gray-800 text-slate-50 border-[3px] border-slate-50 rounded-2xl">
                <option value="0" {{ old('tags') ? '' : 'selected'}} disabled>Select 1 or more tags (hold ctrl or
                    cmd)
                </option>
                @foreach($tags as $tag)
                    {{--    check of bepaalde tags al geselecteerd waren (als validatie fout gaat). ($null = [] is alleen om een specifieke error te fixen)--}}
                    <option
                        {{ in_array($tag['id'], request()->input('tags') ?? $null = [] ) ? 'selected' : '' }} value="{{$tag['id']}}">{{ $tag['name'] }}</option>
                @endforeach

            </select>
        </div>

        <div class="ml-5">
            <x-input-label for="input">Search</x-input-label>
            <x-text-input name="input" value="{{request()->input('input')}}"></x-text-input>
        </div>
        <x-primary-button type="submit" class="flex h-min ml-5">Search</x-primary-button>
    </form>

    <div class="grid grid-cols-3">

        {{--        reverse om nieuwste eerst te laden --}}
        @foreach ($cats->reverse() as $cat)
            <x-cat :cat="$cat" :list="true"></x-cat>
        @endforeach
    </div>
    @if(empty($cats->all()) && !request()->has('input'))
        <div class="m-4 text-2xl">
            <h1 class="text-slate-50">There are currently no cats! Be the first person to add a cat with the link
                below!</h1>
            <a class="text-blue-300 underline" href="{{ route('cats-list.create') }}">Add a cat</a>
        </div>
    @elseif(empty($cats->all()) && request()->has('input'))
        <div class="m-4 text-2xl">
            <h1 class="text-slate-50">No cats found for this search</h1>
        </div>
    @endif
</x-layout>
