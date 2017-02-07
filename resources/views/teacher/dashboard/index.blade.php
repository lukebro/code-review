@extends('layouts.app')

@section('content')

	<section class="section">
		<div class="container">
			<nav class="level">
				<div class="level-left">
					
				</div>
				<div class="level-right">
					<p class="level-item"><a href="{{ route('classroom.create') }}" class="button is-primary">New Classroom</a></p>
				</div>
			</nav>
		</div>

		<div class="container content">
			<h1 class="title">Classrooms</h1>
	
			<div class="columns is-multiline">
			@foreach ($classrooms as $classroom)
				<div class="column is-3">
					@component('components.classroom-tile', ['classroom' => $classroom])@endcomponent
				</div>
			@endforeach
			</div>
		</div>
	</section>

@endsection
