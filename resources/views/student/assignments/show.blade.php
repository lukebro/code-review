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
			@if (! Auth::user()->hasTeam($assignment))
				<div class="level-item"><a href="{{ route('teams.create', $assignment) }}" class="button is-primary">Join Assignment</a></div>
			@else
			<div class="level-item"><a target="_blank" href="https://github.com/{{ $classroom->org }}/{{ $assignment->team(Auth::user())->repo }}" class="button"><span class="icon is-medium"><i class="fa fa-github"></i></span></a></div>
			@endif
			<div class="level-item"><a href="{{ route('classrooms.show', $classroom) }}" class="button">Back</a></div>
		@endcomponent


		<div class="columns">
			<div class="column">

				@if ($assignment->description)
					<div class="box"><p>{!! $assignment->description !!}</p></div>
				@endif

				@php
					$team = $assignment->team(Auth::user());
				@endphp
				@if ($team)
				<div class="columns">
					<div class="column is-6">
						<div class="panel">
							<div class="panel-heading">Team: {{ $team->name }}</div>
							@foreach ($team->users as $teammate)
								<div class="panel-block">
									<p>{{ $teammate->name }}</p>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				@endif

			</div>

			<div class="column is-3 meny">
				<div class="menu-label">Checkpoints</div>
				<ul class="menu-list">
				@foreach ($assignment->checkpoints as $checkpoint)
						@if ($checkpoint->due)
							<strike>
						@endif
						<li><strong>{{ $checkpoint->name }}</strong>
							<ul>
								@if ($checkpoint->due)
									<li>Complete</li>
								@elseif ($checkpoint->due_at->diffInDays(Carbon\Carbon::now()) > 1)
									<li>{{ $checkpoint->due_at->toDayDateTimeString() }}</li>
								@else
									<li>{{ $checkpoint->due_at->diffForHumans() }}</li>
								@endif
							</ul>
						</li>
						@if ($checkpoint->due)
							</strike>
						@endif
				@endforeach
				</ul>
			</div>
		</div>

	@endcomponent

@endsection
