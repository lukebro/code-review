@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				{{ $assignment->name }}
			@endslot

			<div class="level-item"><a href="{{ url()->previous() }}" class="button">Back</a></div>
		@endcomponent

		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h3 class="title">Join Team</h3>
				<div class="panel">
					@if ($assignment->teams()->count())
					@foreach ($assignment->teams as $team)
					<div class="panel-block">
						<div class="column is-12">
						<form method="POST" class="form" action="{{ route('teams.join', [$assignment->id, $team->id]) }}">
							{{ csrf_field() }}
							<div class="is-pulled-left"><strong>{{ $team->name }}</strong></div>

							<div class="is-pulled-right"><button class="button is-primary" type="submit">Join</button></div>
						</form>
						</div>
					</div>
					@endforeach
					@else
					<div class="panel-block">
						<p>No teams exist.</p>
					</div>
					@endif
				</div>
				<h3 class="title">Create Team</h3>
				@include('partials.errors')
				<form method="POST" class="form" action="{{ route('teams.store', $assignment) }}">
						{{ csrf_field() }}
						<div class="field">
							<label class="label">Name*</label>
							<p class="control">
								<input type="text" name="name" class="input" placeholder="Assignment name" autocomplete="off" required>
							</p>
						</div>
						<div class="field">
							<p class="control">
								<button type="submit" class="button is-primary">Create Team</button>
							</p>
						</div>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
