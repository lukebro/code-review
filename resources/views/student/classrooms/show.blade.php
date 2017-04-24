@extends('layouts.app')

@section('content')

    @component('components.section')

        @component('components.menu')
			@slot('title')
				{{ $classroom->name }}
			@endslot
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
											@if ($assignment->nextDueDate->diffInDays(Carbon\Carbon::now()) < 1)
												<strong>{{ $assignment->nextDueDate->diffForHumans() }}</strong>
											@else
												{{ $assignment->nextDueDate->toDayDateTimeString() }}
											@endif
										</small>
									</p>
								</div>
							</div>
						@endforeach
					@endif
				</div>
        	</div>
        </div>

    @endcomponent

@endsection
