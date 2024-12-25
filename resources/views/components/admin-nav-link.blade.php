@props(['active' => false])

<a class="{{ $active ? 'bg-slate-700 text-white font-bold' : 'text-gray-300' }} flex items-center m-2 p-2 rounded-lg hover:bg-gray-700 transition-all" aria-current="{{ $active ? 'page' : 'false' }}"

{{ $attributes }}

>{{ $slot }}</a>