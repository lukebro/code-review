<nav class="level has-margin">
  <div class="label-left">
  	@if (isset($title))
	  	<div class="level-item">
	      <h3 class="title is-3">
	        <strong>{{ $title }}</strong>
          @if (isset($subtitle))
            <small>&ndash; {{ $subtitle }}</small>
          @endif
	      </h3>
	    </div>
    @endif
  </div>
  <div class="level-right">
    {{ $slot }}
  </div>
</nav>
