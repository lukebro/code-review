@extends('layouts.app')

@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Create a classroom</h2>
				<p class="field">In order to create a classroom, you must have a GitHub Organization created for your class.</p>
				@include('partials.errors')
				<form method="POST" class="form" action="{{ route('classrooms.store') }}">
						{{ csrf_field() }}

						<div class="field">
							<label class="label">Name</label>
							<p class="control">
								<input type="text" class="input" name="name" autocomplete="off" placeholder="Class course/name" required>
							</p>
						</div>
						<div class="field">
							<label class="label">GitHub Organization</label>
							<p class="control">
								<span class="select">
								<select name="org" required>
									<option value="">Select organization...</option>
									@foreach ($orgs as $org)
										<option value="{{ $org->name }}">{{ $org->name }}</option>
									@endforeach
								</select>
								</span>
							</p>
						</div>
						<div class="field">
							<p class="control"><button type="submit" class="button is-primary">Create classroom</button></p>
						</div>
						<p class="control">
							<span class="tag is-success">Tip!</span>
							If you don't see you organization here, you have to <a target="_blank" href="https://github.com/settings/connections/applications/{{ env('GITHUB_ID') }}">grant us access</a>.
						</p>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
