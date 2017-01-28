@extends('layouts.app')

@section('content')

	<section class="section">
		<div class="container content">
			<h1 class="title">Dashboard</h1>
			<p>You can only see this page if you're authenticated.</p>
			<p>You are currently signed up as a <span class="tag is-primary">{{ Auth::user()->type }}</span>.</p>
		</div>
	</section>

@endsection
