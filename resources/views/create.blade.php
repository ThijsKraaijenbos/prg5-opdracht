<x-layout>
    <x-nav></x-nav>

    @if($loginCount >= 3 || strtolower(auth()->user()->role) === "admin")
        <form method="post" action="{{route('cats-list.store')}}" enctype="multipart/form-data"
              class="flex flex-col max-w-80">
            @csrf
            <x-input-label class="" for="name">Name</x-input-label>
            <x-text-input type="text" name="name" id="name" value="{{old('name')}}"/>

            <x-input-label for="description">Description</x-input-label>
            <x-custom-textarea>{{old('description')}}</x-custom-textarea>
            <x-input-label for="image">Image</x-input-label>
            <x-text-input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg"/>

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

        {{-- geef error message als je niet 3 keer bent ingelogd (diepere validatie opdracht) --}}
    @else
        <h1 class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 max-w-max m-10 text-5xl">
            Je moet eerst 3 keer inloggen voordat je een kat mag toevoegen</h1>
    @endif
</x-layout>
