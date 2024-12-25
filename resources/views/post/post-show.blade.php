@extends('components.layout')

@section('content')


<div class="m-16">
    <x-postCard :post="$post" full />
</div>


@endsection