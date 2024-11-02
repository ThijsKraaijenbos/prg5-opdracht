@props(['active' => false])

<a {{ $attributes->merge([ 'class' => ($active ? 'active ' : '') . 'h-min items-center bg-blue-100 px-4 py-1 rounded-xl m-2']) }}>{{$slot}}</a>
