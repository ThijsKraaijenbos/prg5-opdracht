@props(['active' => false])

<a class="bg-blue-100 px-4 py-1 rounded-xl m-2 {{$active ? 'active' : ''}}" {{$attributes}}>{{$slot}}</a>
