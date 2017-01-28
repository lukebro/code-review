@extends('layouts.app')

@section('content')

<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        The bridge between coding and teaching.
      </h1>
      <h2 class="subtitle">
        Code review between students and teachers.
      </h2>
      <p><a href="{{ route('login') }}" class="button is-primary is-inverted is-outlined is-medium"><span class="icon is-medium"><i class="fa fa-github"></i></span><span>Sign up through GitHub</span></a></p>
    </div>
  </div>
</section>

<section class="section">
  <nav class="level">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Students</p>
      <p class="title">{{ $students }}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Teachers</p>
      <p class="title">{{ $teachers }}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Assignements</p>
      <p class="title">{{ $assignments }}</p>
    </div>
  </div>
</nav>
</section>

@endsection
