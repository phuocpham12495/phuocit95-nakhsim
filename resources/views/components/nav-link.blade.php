{{-- <a {{$attributes}}>{{$slot}}</a> --}}
@props(['active' => false, 'type' => 'a'])

{{-- <?php
    if ($type == "a") { ?>
        <a class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false"}}" {{ $attributes }}>{{ $slot }}</a>

    <?php } else if ($type == "button") { ?>
        <button class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false"}}" {{ $attributes }}>{{ $slot }}</button>
    <?php }
?> --}}

{{-- @if ($type == 'a')
    <a class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false"}}" {{ $attributes }}>{{ $slot }}</a>
@elseif ($type == "button")
    <button class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false"}}" {{ $attributes }}>{{ $slot }}</button>
@endif --}}

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
