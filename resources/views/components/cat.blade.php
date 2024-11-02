@props([
    'cat',
    'tags',
    'list'
])
<?php $list = $list ?? "" ?>
<div
    class='cc-2 m-5 bg-cc-2 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl flex flex-row justify-between relative'>
    <div class="flex flex-col min-w-min">
        <div>
            <img class="h-60 w-60 rounded-2xl " src="data:image/webp;base64, {{$cat->image}}"
                 alt="Image of {{$cat->name}}">
            <h1 class="text-4xl font-bold mb-4 whitespace-nowrap">{{ucfirst($cat->name)}}</h1>

            <div class="mb-4">
                <p class="text-xl font-bold">Description</p>
                <p class="break-words line-clamp-2">{{$cat->description}}</p>
            </div>

            @if (!$list)
                <div>
                    <p class="text-xl font-bold">Tags</p>
                    <ul class="list-disc ml-3">
                        @foreach($cat->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="flex justify-between flex-row mt-5">
            <div class="left">
                @if($list != "" && auth()->id() !== $cat->user_id)
                    @if (isset(auth()->user()->role) && strtolower(auth()->user()->role) === "admin")
                    @else
                        <div>
                            <a class="font-medium text-2xl text-blue-200 hover:underline"
                               href="{{ $list ? route('cats-list.show', $cat->id) : route('cats-list.index') }}">{{$list ? 'Details' : 'Go back'}}</a>
                        </div>
                    @endif
                @endif
                @auth
                    @if($list != "" && auth()->id() === $cat->user_id || strtolower(auth()->user()->role) === "admin")
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
            <img src="data:image/webp;base64,{{ $cat->user->image }}" alt="Image of {{$cat->user->name}}"
                 class="h-16 w-16 rounded-full absolute right-5 bottom-5"/>
        </div>
    </div>

</div>
