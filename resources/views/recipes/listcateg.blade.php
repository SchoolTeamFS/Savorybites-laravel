@extends('recipes.app')
@section('content')
    @foreach($categories as $elt)
    <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $elt->name)]) }}">
        {{ $elt->name }}
    </a>
@endforeach

