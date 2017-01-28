@extends('layouts.app')


@section('content')

	@component('components.section')
		<h2 class="title is-2">Setup your account</h2>
		<p>We need some more information about you to finish setting up your account!</p>
	
		<form method="POST" class="section form" action="{{ route('setup') }}">
				@include('partials.errors')
				
				{{ csrf_field() }}
				<p class="content is-large" style="line-height: 2.285em">
					Are you <button class="button is-primary is-large" name="type" value="teacher" type="submit">a teacher</button> or a <button class="button is-primary is-large" name="type" value="student" type="submit">a student</button> ?
				</p>
	@endcomponent

@endsection
