<nav class="level has-margin">
  <div class="label-left">
  	@if (isset($title))
	  	<div class="level-item">
	      <h3 class="title is-3">
	        <strong>{{ $title }}</strong>

          {{ isset($subtitle) ? ' &ndash; ' . $subtitle : '' }}
	      </h3>
	    </div>
    @endif
  </div>
  <div class="level-right">
    {{ $slot }}
  </div>
</nav>
