@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				Grading checkpoint "{{ $checkpoint->name }}"
			@endslot

			<div class="level-item"><a href="{{ route('assignments.show', $assignment) }}" class="button">Back</a></div>
		@endcomponent

		<div class="columns">
			<div class="column is-6 is-offset-3">
				<div class="card">
					@if ($checkpoint->submissions->count())
						@foreach ($checkpoint->submissions as $submission)
							<div class="card-content">
								<div class="media">
									<div class="media-content">
										<p class="title is-4">{{ $submission->team->name }}</p>
										<p class="subtitle is-6">{{ $submission->team->users->implode('name') }}</p>
									</div>
								</div>
								<div class="content">
									<div class="field has-addons">
										<p class="control">
											<a href="{{ route('submissions.show', $submission) }}" class="button is-primary">
												<span class="icon"><i class="fa fa-graduation-cap"></i></span>
												<span>Grade</span>
											</a>
										</p>
										<p class="control">
											<a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $submission->team->repo }}/tree/{{ $checkpoint->slug }}" class="button">
												<span class="icon"><i class="fa fa-github"></i></span>
												<span>View Code</span>
											</a>
										</p>
										<p class="control">
											<a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $submission->team->repo }}/commit/{{ $submission->comment_sha }}" class="button">
												<span class="icon"><i class="fa fa-github"></i></span>
												<span>Comment</span>
											</a>
										</p>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="card-content">No teams exist yet.</div>
					@endif
				</div>
			</div>
		</div>
	@endcomponent
@endsection
