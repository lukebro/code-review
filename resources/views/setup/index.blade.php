@extends('layouts.app')


@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Setup your account</h2>
				<p class="content">Finish updating your account details and settings.</p>
				<form method="POST" class="form" action="{{ route('setup') }}">
						@include('partials.errors')
						@include('settings.form', [
							'submit' => ''
						])
						<p class="content is-medium" style="line-height: 2.285em; margin-top: 1em">
							Finally, are you <button class="button is-primary is-medium" name="type" value="teacher" type="submit">a teacher</button> or a <button class="button is-primary is-medium" name="type" value="student" type="submit">a student</button> ?
						</p>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
