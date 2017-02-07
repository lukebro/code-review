{{ csrf_field() }}
<label class="label">Course Number</label>
<p class="control">
	<input class="input" type="text" name="course" placeholder="CS 110" autocomplete="off" required>
</p>

<label class="label">Class Name</label>
<p class="control">
	<input class="input" type="text" name="name" placeholder="Computer Science 1" autocomplete="off" required>
</p>

<p class="control">
	<button type="submit" class="button is-primary">{{ $submit }}</button>
</p>
