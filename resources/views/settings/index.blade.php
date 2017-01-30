@extends('layouts.app')


@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Settings</h2>
				<form method="POST" class="form" action="{{ route('settings') }}">
						@include('partials.errors')
						{{ method_field('PATCH') }}
						@include('settings.form', [
							'submit' => 'Save',
						])
				</form>
			</div>
		</div>
	@endcomponent

@endsection
