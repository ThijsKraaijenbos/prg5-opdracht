<x-layout pagename="Add a new cat">
    <x-nav></x-nav>

    <div class="flex flex-row">
        @if($loginCount >= 3 || strtolower(auth()->user()->role) === "admin")
            <form method="post" action="{{route('cats-list.store')}}" enctype="multipart/form-data"
                  class="flex flex-col max-w-80 m-5">
                @csrf
                <x-input-label class="" for="name">Name</x-input-label>
                <x-text-input type="text" name="name" id="name" value="{{old('name')}}"/>

                <x-input-label for="description" class="mt-5">Description</x-input-label>
                <x-custom-textarea>{{old('description')}}</x-custom-textarea>

                <x-input-label for="image" class="mt-5">Image</x-input-label>
                <x-text-input type="file" name="image" id="image" accept="image/png, image/gif, image/jpg, image/jpeg"/>

                <x-input-label for="tags" class="mt-5">Tags</x-input-label>
                <select name="tags[]" id="tags[]" multiple=""
                        class="h-[70%] flex flex-col cc-2 bg-gray-800 text-slate-50 border-[3px] border-slate-50 rounded-2xl">
                    <option value="0" {{ old('tags') ? '' : 'selected'}} disabled>Select 1 or more tags (hold ctrl or
                        cmd)
                    </option>
                    @foreach($tags as $tag)
                        {{--    check of bepaalde tags al geselecteerd waren (als validatie fout gaat). ($null = [] is alleen om een specifieke error te fixen)--}}
                        <option
                            {{ in_array($tag['id'], old('tags') ?? $null = [] ) ? 'selected' : '' }} value="{{$tag['id']}}">{{ $tag['name'] }}</option>
                    @endforeach

                </select>

                <x-primary-button type="submit" class="mt-5">Create</x-primary-button>
            </form>


            <x-cat-alerts></x-cat-alerts>
    </div>


    {{-- geef error message als je niet 3 keer bent ingelogd (diepere validatie opdracht) --}}
    @else
        <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400 max-w-max m-10 text-5xl">
            <h1>
            Je moet eerst 3 keer inloggen voordat je een kat mag toevoegen</h1>
        <p>Je moet nog {{ 3 - $loginCount}} keer inloggen om een kat toe te voegen</p>
        </div>
    @endif
</x-layout>
