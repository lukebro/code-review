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

			<div class="level-item"><a href="#" class="button"><span class="icon is-medium"><i class="fa fa-gear"></i></span></a></div>
			<div class="level-item"><a href="{{ route('classrooms.show', $classroom->id) }}" class="button">Back</a></div>
		@endcomponent


		<div class="columns">
			<div class="column">

				@if ($assignment->description)
					<div class="box"><p>{!! $assignment->description !!}</p></div>
				@endif

				<div class="columns">
					<div class="column is-6">
						<div class="panel">
							<div class="panel-heading">Teams</div>
							@if ($assignment->teams->count())
								@foreach ($assignment->teams as $team)
									<div class="panel-block">
										<div><a target="_blank" href="https://github.com/{{ $assignment->classroom->org }}/{{ $team->repo }}">{{ $team->name }}</a> - {{ $team->users->implode('name') }}</div>
									</div>
								@endforeach
							@else
							<div class="panel-block">
								<p>No teams exist yet.</p>
							</div>
							@endif
						</div>
					</div>
				</div>

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
