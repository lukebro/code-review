@extends('layouts.app')

@section('content')

	<section class="section">
		<div class="container content">
			<h1 class="title">Dashboard</h1>
			<p>You are currently signed up as a <span class="tag is-primary">{{ $user->type }}</span> and are part of <span class="tag is-primary">{{ $user->school->name }}</span>.</p>
		</div>
	</section>

@endsection
