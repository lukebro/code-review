@extends('layouts.app')

@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Create a classroom</h2>
				<form method="POST" class="form" action="{{ route('classroom.store') }}">
						@include('partials.errors')
						@include('teacher.classroom.partials.form', [
							'submit' => 'Create Class'
						])
				</form>
			</div>
		</div>
	@endcomponent

@endsection
