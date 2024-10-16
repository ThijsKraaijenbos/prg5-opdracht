@props([
    'cat',
    'list'
])
<?php $list = $list ?? "" ?>
<div class='cc-2 m-5 bg-cc-2 text-slate-50'>
{{--    <h1>{{$cat->id}}</h1>--}}
    <h1>Name: {{$cat->name}}</h1>
    <p>User Id: {{$cat->user_id}}</p>
    <p>Description: {{$cat->description}}</p>
    <img src="data:image/png;base64, {{$cat->image}}">
    <p>Active: {{$cat->active ? 'True' : ''}}</p>
    <a class="font-medium text-blue-200 hover:underline" href="{{ $list ? route('cats-list.show', $cat->id) : route('cats-list.index') }}">{{$list ? 'Details' : 'Back to Cats List'}}</a>
    <form method="POST" action="{{route('cats-list.destroy', $cat->id)}}">
        @method('DELETE')
        @csrf
        <x-primary-button type="submit">Delete</x-primary-button>
    </form>
</div>
