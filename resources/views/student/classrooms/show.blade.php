@extends('layouts.app')

@section('content')

    @component('components.section')

        <h2 class="title is-2">{{ $classroom->name }}</h2>

        <p>Welcome to the classroom student!</p>

    @endcomponent

@endsection