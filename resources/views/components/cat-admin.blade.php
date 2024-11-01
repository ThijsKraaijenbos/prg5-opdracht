@props([
    'cat'
])
<div
    class='cc-2 m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-row gap-5 items-center justify-between w-[50vw]'>
    <div class="flex flex-col gap-2 max-w-[70%]">
        <h1>Name: {{ucfirst($cat->name)}}</h1>
        <p>Description: {{$cat->description}}</p>
        <img class="h-32 w-32 " src="data:image/webp;base64, {{$cat->image}}" alt="Image of {{$cat->name}}">
        <img class="h-16 w-16 rounded-full" src="data:image/webp;base64, {{$cat->user->image}}"
             alt="Image of {{$cat->user->name}}">
    </div>

    <div class="max-w-[30%] flex flex-col align-middle">
        <form method="POST" action="{{ route('admin.update', $cat->id) }}">
            @csrf
            @method('PUT')
            <x-active-button>{{ $cat->active ? 'Visibility: Shown' : 'Visibility: Hidden' }}</x-active-button>
        </form>
        <a class="font-medium text-2xl text-blue-200 hover:underline" href="{{route('cats-list.edit', $cat->id)}}">
            Edit</a>
        <form method="POST" action="{{route('cats-list.destroy', $cat->id)}}">
            @method('DELETE')
            @csrf
            <x-primary-button type="submit">Delete</x-primary-button>
        </form>
    </div>
</div>
