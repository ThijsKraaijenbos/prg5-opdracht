<x-layout>
    <x-nav></x-nav>

    @if($loginCount >= 3 || strtolower(auth()->user()->role) === "admin")
        <form method="post" action="{{route('cats-list.store')}}" enctype="multipart/form-data"
              class="flex flex-col max-w-80 m-5">
            @csrf
            <x-input-label class="" for="name">Name</x-input-label>
            <x-text-input type="text" name="name" id="name" value="{{old('name')}}"/>

            <x-input-label for="description" class="mt-5">Description</x-input-label>
            <x-custom-textarea>{{old('description')}}</x-custom-textarea>
            <x-input-label for="image" class="mt-5">Image</x-input-label>
            <x-text-input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg"/>

            <x-input-label for="tags" class="mt-5">Tags</x-input-label>

            <select name="tags[]" id="tags[]" multiple="" class="h-max">
                <option value="0" {{ old('tags') ? '' : 'selected'}} disabled>Select 1 or more tags (hold ctrl or cmd)
                </option>
                @foreach($tags as $tag)
                    {{--    check of bepaalde tags al geselecteerd waren (als validatie fout gaat). ($null = [] is alleen om een specifieke error te fixen)--}}
                    <option
                        {{ in_array($tag['id'], old('tags') ?? $null = [] ) ? 'selected' : '' }} value="{{$tag['id']}}">{{ $tag['name'] }}</option>
                @endforeach

            </select>

            <x-primary-button type="submit" class="mt-5">Create</x-primary-button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger bg-red-600 w-max">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- geef error message als je niet 3 keer bent ingelogd (diepere validatie opdracht) --}}
    @else
        <h1 class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 max-w-max m-10 text-5xl">
            Je moet eerst 3 keer inloggen voordat je een kat mag toevoegen</h1>
    @endif
</x-layout>
