<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item">
        <img src="{{ asset('images/icon.svg') }}" alt="Code Review">
      </a>
      <a href="{{ route('classrooms.index') }}" class="nav-item is-tab is-hidden-mobile {{ Request::is('classrooms*') ? 'is-active' : null }}">Classrooms</a>
    </div>
    <div class="nav-right nav-menu">
        <a href="{{ route('settings') }}" class="nav-item is-tab {{ Request::is('settings*') ? 'is-active' : null }}">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="{{ Auth::user()->avatar_url }}">
          </figure>
         {{ Auth::user()->username }}
        </a>
        <a href="{{ route('logout') }}" class="nav-item is-tab">Log out</a>
    </div>
  </div>
</nav>
