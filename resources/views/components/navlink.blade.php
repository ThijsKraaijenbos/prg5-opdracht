@props(['active' => false])

<a {{ $attributes->merge([ 'class' => ($active ? 'active ' : '') . 'h-min items-center bg-blue-100 px-4 py-1 rounded-xl m-2 font-bold border-solid border-4 border-cc-1']) }}>{{$slot}}</a>
