<x-layout>
    <x-nav></x-nav>

    <form method="post" action="{{route('cats-list.store')}}" enctype="multipart/form-data" class="flex flex-col max-w-80">
        @csrf
        <x-input-label class="" for="name">Name</x-input-label>
        <x-text-input type="text" name="name" id="name" value="{{old('name')}}"/>

        <x-input-label for="description">Description</x-input-label>
        <x-text-input type="text" name="description" id="description" value="{{old('description')}}"/>

        <x-input-label for="image">Image</x-input-label>
        <x-text-input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg" />

        <x-primary-button type="submit">Create</x-primary-button>
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
