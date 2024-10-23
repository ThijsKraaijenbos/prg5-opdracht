@props([
    'cat',
    'list'
])
<?php $list = $list ?? "" ?>
<div class='cc-2 m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-row justify-between'>
    <div class="flex flex-col">
        <div>
            <img class="h-60 w-60 " src="data:image/webp;base64, {{$cat->image}}" alt="Image of {{$cat->name}}">
            <h1 class="text-2xl font-bold">{{$cat->name}}</h1>
            <p class="line-clamp-2">{{$cat->description}}</p>


        </div>
        <div class="flex justify-items-end flex-col mt-5">

            @if($list != "" && auth()->id() !== $cat->user_id)
                <div>
                    <a class="font-medium text-2xl text-blue-200 hover:underline"
                       href="{{ $list ? route('cats-list.show', $cat->id) : route('cats-list.index') }}">{{$list ? 'Details' : 'Go back'}}</a>
                </div>
            @endif
            @auth
                @if($list != "" && auth()->id() === $cat->user_id)
                    <div>
                        <a class="font-medium text-2xl text-blue-200 hover:underline"
                           href="{{ $list ? route('cats-list.show', $cat->id) : route('cats-list.index') }}">{{$list ? 'Details' : 'Go back'}}</a>
                        <a class="font-medium text-2xl text-blue-200 hover:underline"
                           href="{{route('cats-list.edit', $cat->id)}}">| Edit</a>
                    </div>
                    <form method="POST" action="{{route('cats-list.destroy', $cat->id)}}">
                        @method('DELETE')
                        @csrf
                        <x-primary-button type="submit">Delete</x-primary-button>
                    </form>
                @endisset
            @endauth
        </div>
    </div>
    <div class="max-w-max min-w-max flex items-end justify-end">
        <img src="data:image/jpeg;base64,{{ $cat->user->image }}" alt="Image of associated user for {{$cat->name}}"
             class="h-16 w-16 rounded-full"/>
    </div>

</div>
