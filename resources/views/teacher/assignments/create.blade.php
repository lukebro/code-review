@extends('layouts.app')

@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title">Create an assignment</h2>
				<h3 class="subtitle">In classroom "{{ $classroom->name }}".</h3>
				@include('partials.errors')
				<form method="POST" class="form" action="{{ route('assignments.store', $classroom->id) }}">
						{{ csrf_field() }}
						<div class="field">
							<label class="label">Name</label>
							<p class="control">
								<input type="text" name="name" class="input" placeholder="Assignment name" autocomplete="off" required>
							</p>
						</div>
						<div class="field">
							<label class="label">Repository Prefix</label>
							<p class="control">
								<input type="text" name="prefix" class="input" placeholder="Assignment prefix" autocomplete="off" required>
							</p>
						</div>
						<div class="field">
							<p class="control">
								<label class="radio"><input type="radio" name="public" value="1" checked required><span class="label">Public</span></label>
								<label class="radio"><input type="radio" name="public" value="0" required><span class="label">Private</span></label>
							</p>
						</div>
						<div class="field">
							<p class="control">
								<button type="submit" class="button is-primary">Create Assignment</button>
							</p>
						</div>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
