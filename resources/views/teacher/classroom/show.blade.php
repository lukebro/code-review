@extends('layouts.app')

@section('content')

	@component('components.section')

		<h2 class="title is-2">{{ $classroom->name }}</h2>
		<h4 class="subtitle is-4">{{ $classroom->course }}</h4>

		<div class="columns">
		<div class="column is-9"></div>
		<div class="column is-3 panel">
			<p class="panel-heading">Students</p>
			@foreach ($classroom->students as $student)
				<p class="panel-block">{{ $student->name }}</p>
			@endforeach
		</div>
		</div>

	@endcomponent

@endsection
