@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <nav class="level">
                <div class="level-left">

                </div>
                <div class="level-right">
                    <p class="level-item"><a href="{{ route('classrooms.create') }}" class="button is-primary">New Classroom</a></p>
                </div>
            </nav>
        </div>

        <div class="container content">
            <h1 class="title">Classrooms</h1>

        @if ($classrooms->isEmpty())
            <p>You have no classrooms, create one.</p>
        @else
            <div class="columns is-multiline">
                @foreach ($classrooms as $classroom)
                <div class="column is-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                            {{ $classroom->name }}
                            </p>
                        </header>
                        <footer class="card-footer">
                            <a href="{{ route('classrooms.show', $classroom->id) }}" class="card-footer-item">View</a>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        </div>
    </section>

@endsection
