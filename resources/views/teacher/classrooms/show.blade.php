@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				{{ $classroom->name }}
			@endslot

			<div class="level-item"><a href="{{ route('assignments.create', $classroom->id) }}" class="button is-primary">Create assignment</a></div>
			<div class="level-item"><a target="_blank" href="https://github.com/{{ $classroom->org }}" class="button"><span class="icon is-medium"><i class="fa fa-github"></i></span></a></div>
			<div class="level-item"><a href="#" class="button"><span class="icon is-medium"><i class="fa fa-gear"></i></span></a></div>
		@endcomponent

		<div class="columns">
			<div class="column is-6">
				<div class="panel">
					<div class="panel-heading">Assignments</div>
					@if ($classroom->assignments->isEmpty())
						<div class="panel-block"><p>No assignments exist yet.</p></div>
					@else
						@foreach ($classroom->assignments as $assignment)
							<div class="panel-block">
								<div class="content">
									<p>
										<div class="title"><a href="{{ route('assignments.show', $assignment) }}">{{ $assignment->name }}</a></div>
										<small>Next due date:
											<strong>
											@if (is_null($assignment->nextDueDate))
												None
											@elseif ($assignment->nextDueDate->diffInDays(Carbon\Carbon::now()) < 1)
												{{ $assignment->nextDueDate->diffForHumans() }}
											@else
												{{ $assignment->nextDueDate->toDayDateTimeString() }}
											@endif
											</strong>
										</small>
									</p>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
			<div class="column is-3 is-offset-3">
				<div class="panel">
					<p class="panel-heading">Invitation Link</p>
					<p class="panel-block"><input type="textbox" class="input" placeholder="Class Code" value="{{ $classroom->url }}" readonly></p>
				</div>
	            <div class="panel">
	                <div class="panel-heading">Students</div>
	                @if ($classroom->students->isEmpty())
	                	<div class="panel-block">No students yet.</div>
	                @else
		                @foreach ($classroom->students as $student)
		                	<div class="panel-block">{{ $student->name }}</div>
		                @endforeach
	                @endif
	            </div>
			</div>
		</div>

	@endcomponent

@endsection
