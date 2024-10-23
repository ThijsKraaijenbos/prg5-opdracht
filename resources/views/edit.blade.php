<x-layout>
    <x-nav></x-nav>

    <form method="post" action="{{route('cats-list.update', $cat)}}" enctype="multipart/form-data"
          class="flex flex-col max-w-80">
        @csrf
        @method('PATCH')
        <x-input-label class="" for="name">Name</x-input-label>
        <x-text-input type="text" name="name" id="name" value="{{old('name', $cat->name)}}"/>

        <x-input-label for="description">Description</x-input-label>
        <x-custom-textarea>{{old('description', $cat->description)}}</x-custom-textarea>
        <x-input-label for="image">Image</x-input-label>
        <x-text-input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg"/>

        <img class="h-60 w-60 " src="data:image/webp;base64, {{$cat->image}}" alt="Image of {{$cat->name}}">

        <a href="{{ route('cats-list.index') }}">Cancel</a>
        <x-primary-button type="submit">Update</x-primary-button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>
