@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				<b>{{ $team->name }}</b> submission of <i>{{ $checkpoint->assignment->name }} - {{ $checkpoint->name }}</i>
			@endslot

			@slot('subtitle')
				By {{ $team->displayUsers() }}
			@endslot

			<div class="level-item">
				<a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $submission->team->repo }}/tree/{{ $checkpoint->slug }}" class="button">
					<span class="icon"><i class="fa fa-github"></i></span>
					<span>View Code</span>
				</a>
			</div>
			<div class="level-item">
				<a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $submission->team->repo }}/commit/{{ $submission->comment_sha }}" class="button">
					<span class="icon"><i class="fa fa-github"></i></span>
					<span>Comment</span>
				</a>
			</div>
			<div class="level-item">
				<a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $submission->team->repo }}/archive/{{ $checkpoint->slug }}.zip" class="button">
					<span class="icon"><i class="fa fa-github"></i></span>
					<span>Download Code</span>
				</a>
			</div>
			<div class="level-item"><a href="{{ route('grades.show', $checkpoint) }}" class="button">Back</a></div>
		@endcomponent

		<div class="content">
			<p>These comments and grades are stored inside Code Review, any comments you place on the commit will also show up in the grade.</p>
		</div>

		<div class="columns">
			<div class="column is-6">
				<div class="field">
					<label class="label">Team Comments</label>
					<p class="control">
						<textarea class="textarea" placeholder="Comments that all team members will see."></textarea>
					</p>
					<p class="help">Supports <a target="_blank" href="https://guides.github.com/features/mastering-markdown/">GitHub flavored markdown</a>.</p>
				</div>
				@foreach ($students as $student)
					<hr>
					<div class="title is-3">{{ $student->name }}</div>
					<div class="field">
						<label class="label">Grade</label>
						<div class="field has-addons">
							<p class="control">
						        <input class="input is-centered" type="number" step="any" placeholder="Grade">
							</p>
							<p class="control">
								<button class="button is-text" disabled>out of&nbsp;<strong>{{ $checkpoint->points }} points</strong></button>
							</p>
						</div>
					</div>
					<div class="field">
						<label class="label">Comments only for {{ $student->name }}</label>
						<p class="control">
							<textarea class="textarea" placeholder="Comments that only {{ $student->name }} will see."></textarea>
						</p>
						<p class="help">Supports <a target="_blank" href="https://guides.github.com/features/mastering-markdown/">GitHub flavored markdown</a>.</p>
					</div>
				@endforeach

				<div class="field">
					<p class="control">
						<button class="button is-primary">Grade</button>
					</p>
				</div>
			</div>
		</div>
	@endcomponent
@endsection
