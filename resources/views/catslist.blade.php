<x-layout>
    <x-nav></x-nav>
    @foreach ($cats as $cat)
        <div class='cat'>
            <h1>{{$cat->id}}</h1>
            <h1>Name: {{$cat->name}}</h1>
            <p>User Id: {{$cat->user_id}}</p>
            <p>Description: {{$cat->description}}</p>
            <p>Image: {{$cat->image}}</p>
            <p>Active: {{$cat->active ? 'True' : ''}}</p>
            <a href="{{route('cats-list.show', $cat->id)}}">Show Cat</a>
        </div>
    @endforeach
</x-layout>
