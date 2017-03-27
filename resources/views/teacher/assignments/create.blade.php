@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				{{ $classroom->name }}
			@endslot

			<div class="level-item"><a href="{{ url()->previous() }}" class="button">Back</a></div>
		@endcomponent

		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title">Create an assignment</h2>
				@include('partials.errors')
				<form method="POST" class="form" action="{{ route('assignments.store', $classroom->id) }}">
						{{ csrf_field() }}
						<div class="field">
							<label class="label">Name*</label>
							<p class="control">
								<input type="text" name="name" class="input" placeholder="Assignment name" autocomplete="off" required>
							</p>
						</div>
						<div class="field">
							<label class="label">Repository Prefix*</label>
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
							<label class="label">Description</label>
							<p class="control">
								<textarea name="description" placeholder="Description of the assignment, supports GitHub flavored markdown." class="textarea"></textarea>
							</p>
							<p class="help">Supports <a target="_blank" href="https://guides.github.com/features/mastering-markdown/">GitHub flavored markdown</a>.</p>
						</div>
						<hr>
						<div class="field">
							<p class="control">
								<div class="title is-4">Checkpoints</hdiv>
								<div class="subtitle is-6">Checkpoints allow for a way to progressivly grade assignments.  Splitting one assignment into multiple submissions.  At least one checkpoint/submission must be present.</div>
							</p>
						</div>

						<div class="field">
							<p class="control">
								<checkpoint-creator></checkpoint-creator>
							</p>
						</div>
						<hr>
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
