@extends('layouts.app')

@section('content')

	<section class="section">
		<div class="container">
			<nav class="level">
				<div class="level-left">
					
				</div>
				<div class="level-right">
					<p class="level-item"><a href="{{ route('classroom.create') }}" class="button is-primary">New Classroom</a></p>
				</div>
			</nav>
		</div>

		<div class="container content">
			<h1 class="title">Dashboard</h1>
	
			<div class="columns is-multiline">
				<div class="column">For now, nothing.</div>
			</div>
		</div>
	</section>

@endsection
