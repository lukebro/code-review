@extends('layouts.app')


@section('content')

	@component('components.section')

		<h1 class="title">Current Classrooms</h1>

		@if ($classrooms->isEmpty())
			<p>You're not in any classrooms.  To join a classroom, get the invite link from your teacher.</p>
		@else
			<div class="columns is-multiline">
				@foreach ($classrooms as $classroom)
				<div class="column is-3">
					<div class="card">
						<header class="card-header">
							<p class="card-header-title">
							{{ $classroom->name }}
							</p>
						</header>
						<footer class="card-footer">
							<a href="{{ route('classrooms.show', $classroom->id) }}" class="card-footer-item">View</a>
						</footer>
					</div>
				</div>
				@endforeach
			</div>
		@endif

	@endcomponent


@endsection
