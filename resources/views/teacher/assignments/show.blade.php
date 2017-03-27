@extends('layouts.app')


@section('content')

	@component('components.section')

		@component('components.menu')
			@slot('title')
				{{ $classroom->name }}
			@endslot

			@slot('subtitle')
				{{ $assignment->name }}
			@endslot

			<div class="level-item"><a href="#" class="button is-primary">Gradebook</a></div>
			<div class="level-item"><a href="{{ route('classrooms.show', $classroom->id) }}" class="button">Back</a></div>
		@endcomponent


		<div class="columns">
			<div class="column">

				<p>📝</p>

			</div>

			<div class="column is-3 meny">
				<div class="menu-label">Checkpoints</div>
				<ul class="menu-list">
				@foreach ($assignment->checkpoints as $checkpoint)
						<li><strong>{{ $checkpoint->name }}</strong>
							<ul>
								@if ($checkpoint->due_at->diffInDays(Carbon\Carbon::now()) > 1)
									<li>{{ $checkpoint->due_at->toDayDateTimeString() }}</li>
								@else
									<li>{{ $checkpoint->due_at->diffForHumans() }}</li>
								@endif
							</ul>
						</li>
				@endforeach
				</ul>
			</div>
		</div>

	@endcomponent

@endsection
