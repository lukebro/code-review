<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item">
        <img src="{{ asset('images/logo.svg') }}" alt="Code Review">
      </a>
      <a href="{{ url('/') }}" class="nav-item is-tab is-hidden-mobile is-active">Home</a>
    </div>
    <div class="nav-right nav-menu">
      <span class="nav-item">
        <a href="{{ route('login') }}" class="button is-primary">
          <span class="icon">
           <i class="fa fa-github"></i>
          </span>
          <span>Sign in with GitHub</span>
        </a>
      </span>
    </div>
  </div>
</nav>
