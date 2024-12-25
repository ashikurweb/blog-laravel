@props(['active' => false])

<a class="{{ $active ? 'bg-slate-700 text-white font-bold' : 'text-gray-300' }} px-3 py-2 rounded-md hover:bg-gray-600 text-medium font-medium" aria-current="{{ $active ? 'page' : 'false' }}"

{{ $attributes }}

>{{ $slot }}</a>