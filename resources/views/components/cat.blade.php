@props([
    'cat',
    'list'
])
<?php $list = $list ?? "" ?>
<div class='cc-2 m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl grid grid-cols-2'>
    <div>
    <h1>Name: {{$cat->name}}</h1>
    <p>Description: {{$cat->description}}</p>
    <img class="h-60 w-60 " src="data:image/webp;base64, {{$cat->image}}" alt="Image of {{$cat->name}}">
    @auth
        <a class="font-medium text-2xl text-blue-200 hover:underline" href="{{ $list ? route('cats-list.show', $cat->id) : route('cats-list.index') }}">{{$list ? 'Details' : 'Go back'}}</a>
        @if($list != "" && auth()->id() === $cat->user_id)
            <a class="font-medium text-2xl text-blue-200 hover:underline" href="{{route('cats-list.edit', $cat->id)}}">| Edit</a>
            <form method="POST" action="{{route('cats-list.destroy', $cat->id)}}">
                @method('DELETE')
                @csrf
                <x-primary-button type="submit">Delete</x-primary-button>
            </form>
        @endisset
    @endauth
    </div>
    <img src="data:image/jpeg;base64,{{ $cat->user->image }}" alt="Image of associated user for {{$cat->name}}" class="h-16 w-16 rounded-full" />

</div>
