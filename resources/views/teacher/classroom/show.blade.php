@extends('layouts.app')

@section('content')

	@component('components.section')

		<h2 class="title is-2">{{ $classroom->name }}</h2>

		<div class="columns">
			<div class="column is-4 panel">
				<p class="panel-heading">Invite Code</p>
				<p class="panel-block"><input type="textbox" class="input" placeholder="Class Code" value="{{ $classroom->code }}" readonly></p>
			</div>
			<div class="column is-4 panel">
				<p class="panel-heading">Students</p>
				@if ($classroom->students->isEmpty())
					<p class="panel-block"><strong>None.</strong></p>
				@else
					@foreach ($classroom->students as $student)
					<p class="panel-block">{{ $student->name }}</p>
					@endforeach
				@endif
			</div>
			<div class="column is-4 panel">
				<p class="panel-heading">Pending</p>
				@if ($classroom->pendings->isEmpty())
					<p class="panel-block"><strong>None.</strong></p>
				@else
					@foreach ($classroom->pendings as $pending)
					<div class="panel-block">
							{{ $pending->user->name }}
							<form class="form" method="POST" action="{{ route('classroom.pending', $classroom->id) }}">
								{{ csrf_field() }}
								<div class="control is-grouped">
									<p class="control"><button type="submit" name="accept" value="{{ $pending->id }}" class="button is-primary">Accept</button></p>
									<p class="control"><button type="submit" name="deny" value="{{ $pending->id }}" class="button is-danger">Deny</button></p>
								</div>
							</form>
					</div>
					@endforeach
				@endif
			</div>
		</div>

	@endcomponent

@endsection