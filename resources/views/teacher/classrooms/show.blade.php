@extends('layouts.app')

@section('content')

	@component('components.section')

		<h2 class="title is-2">{{ $classroom->name }}</h2>

		<div class="columns">
			<div class="column is-6 panel">
				<p class="panel-heading">Invitation Link</p>
				<p class="panel-block"><input type="textbox" class="input" placeholder="Class Code" value="{{ $classroom->url }}" readonly></p>
			</div>
            <div class="column is-6 panel">
                <div class="panel-heading">Students</div>
                @foreach ($classroom->students as $student)
                <div class="panel-block">{{ $student->name }}</div>
                @endforeach
            </div>
		</div>

	@endcomponent

@endsection