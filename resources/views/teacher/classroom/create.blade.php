@extends('layouts.app')

@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Create a classroom</h2>
				@include('partials.errors')
				<form method="POST" class="form" action="{{ route('classroom.store') }}">
						{{ csrf_field() }}
						<p class="control">In order to create a classroom, you must have a GitHub Organization created for your class.</p>
						<label class="label">GitHub Organization</label>
						<p class="control">
							<span class="select">
							<select name="name" required>
								<option value="">Select organization...</option>
								@foreach ($orgs as $org)
									<option value="{{ $org->name }}">{{ $org->name }}</option>
								@endforeach
							</select>
							</span>
						</p>
						<p class="control"><button type="submit" class="button is-primary">Create Classroom</button></p>
						<p class="control">If you don't see you organization here, you have to <a target="_blank" href="https://github.com/settings/connections/applications/{{ env('GITHUB_ID') }}">grant us access</a>.</p>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
