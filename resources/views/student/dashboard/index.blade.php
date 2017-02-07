@extends('layouts.app')


@section('content')

	@component('components.section')
		<div class="container">
			<nav class="level">
				<div class="level-left"></div>
				<div class="level-right">
					<p class="level-item">		
						<form method="POST" action="{{ route('classroom.join') }}">		
						{{ csrf_field() }}	
						<p class="control has-addons">
							<input class="input" type="text" name="code" placeholder="Classroom Code">
							<button type="submit" class="button is-primary">Join</button>
						</p>
						</form>
					</p>
				</div>
			</nav>
		</div>

		<h1 class="title">Current Active Classrooms</h1>

		<div class="columns is-multiline">
			@if ($classrooms->isEmpty())
				<p>You're not in any classrooms.</p>
			@else
				@foreach ($classrooms as $classroom)
				<div class="column is-3">
					<div class="card">
						<header class="card-header">
							<p class="card-header-title">
							{{ $classroom->name }} ({{ $classroom->course }})
							</p>
						</header>
						<footer class="card-footer">
							<a class="card-footer-item">View</a>
						</footer>						
					</div>
				</div>
				@endforeach
			@endif
		</div>
	@endcomponent


@endsection
