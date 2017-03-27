@extends('layouts.app')

@section('content')


    @component('components.section')
        @component('components.menu')
            <div class="level-item"><a href="{{ route('classrooms.create') }}" class="button is-primary">New classroom</a></div>
         @endcomponent
        <div class="columns">
            <div class="column is-6 is-offset-3 panel">
                <div class="panel-heading">Classrooms</div>

                @if ($classrooms->isEmpty())
                <div class="panel-block">
                    <p>You have no classrooms.</p>
                </div>
                @else
                    @foreach ($classrooms as $classroom)
                    <div class="panel-block">
                        <div class="content">
                            <p>
                                <div class="title"><a href="{{ route('classrooms.show', $classroom->id) }}">{{ $classroom->name }}</a> <small>&ndash; {{ $classroom->org }}</small></div>
                                <small>
                                    Assignments &ndash; <strong>{{ $classroom->assignments()->count() }}</strong>
                                    <br>
                                    Students &ndash; <strong>{{ $classroom->students()->count() }}</strong>
                                </small>
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endcomponent

@endsection
