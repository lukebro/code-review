@extends('layouts.app')

@section('content')

	@component('components.section')
		@component('components.menu')
			@slot('title')
				{{ $classroom->name }}
			@endslot

			<div class="level-item"><a href="{{ route('assignments.create', $classroom->id) }}" class="button is-primary">Create assignement</a></div>
			<div class="level-item"><button @click="$emit('modal', 'gradebook')" class="button is-primary">Gradebook</button></div>
			<div class="level-item"><a target="_blank" href="https://github.com/{{ $classroom->org }}" class="button"><span class="icon is-medium"><i class="fa fa-github"></i></span></a></div>
		@endcomponent

		<div class="columns">
			<div class="column is-6">
				<div class="panel">
					<div class="panel-heading">Assignments</div>
					@if ($classroom->assignments->isEmpty())
						<div class="panel-block"><p>No assignments exist yet.</p></div>
					@else
						@foreach ($classroom->assignments->sortByDesc('created_at') as $assignment)
							<div class="panel-block">
								<a href="{{ route('assignments.show', [$classroom->id, $assignment->id]) }}">{{ $assignment->name }}</a>
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

	<modal name="gradebook">
		<template slot="title">Gradebook</template>

		<p>The gradebook stuff maybe will go here? Not sure yet.. 🤔</p>
	</modal>

@endsection
