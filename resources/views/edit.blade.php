<x-layout>
    <x-nav></x-nav>

    <div class="flex flex-row">
    <form method="post" action="{{route('cats-list.update', $cat)}}" enctype="multipart/form-data"
          class="flex flex-col max-w-80 m-5">
        @csrf
        @method('PATCH')
        <x-input-label class="" for="name">Name</x-input-label>
        <x-text-input type="text" name="name" id="name" value="{{old('name', $cat->name)}}"/>

        <x-input-label for="description" class="mt-5">Description</x-input-label>
        <x-custom-textarea>{{old('description', $cat->description)}}</x-custom-textarea>

        <x-input-label for="image" class="mt-5">Image</x-input-label>
        <x-text-input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg"/>

        <img class="h-60 w-60 mt-5" src="data:image/webp;base64, {{$cat->image}}" alt="Image of {{$cat->name}}">


        <x-input-label for="tags" class="mt-5">Tags</x-input-label>
        <select name="tags[]" id="tags[]" multiple="" class="h-max">
            <option value="0" {{ old('tags') ? '' : 'selected'}} disabled>Select 1 or more tags (hold ctrl or cmd)
            </option>
            @foreach($tags as $tag)

                <option
                    {{ in_array($tag['id'], old('tags') ?? $null = [] ) ? 'selected' : '' }} value="{{$tag['id']}}">{{ $tag['name'] }}</option>
            @endforeach

        </select>

        <a class="text-red-400 mt-5" href="{{ route('cats-list.index') }}">Cancel</a>
        <x-primary-button class="mt-1" type="submit">Update</x-primary-button>
    </form>

        <x-cat-alerts></x-cat-alerts>
    </div>
</x-layout>
