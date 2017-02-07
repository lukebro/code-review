<div class="card">
	<header class="card-header">
		<p class="card-header-title">
		{{ $classroom->name }}
		</p>
	</header>
	<div class="card-content">
		<div class="content">
			<span class="tag is-black">Code# {{ strtoupper($classroom->code) }}</span>
			<br>
			<small>Created {{ $classroom->created_at->diffForHumans() }}</small>
		</div>
	</div>
	<footer class="card-footer">
	<a href="{{ route('classroom.show', $classroom->id) }}" class="card-footer-item">View</a>
	</footer>
</div>
