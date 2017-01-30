						{{ csrf_field() }}
						<label class="label">Your username</label>
						<p class="control">
						  <input class="input is-disabled" type="text" value="{{ $user->username }}" disabled>
						  <span class="help is-danger">Your username is unchangeable.</span>
						</p>
						<label class="label">Your name</label>
						<p class="control">
						  <input class="input" name="name" type="text" value="{{ old('name') ?? $user->name }}" autocomplete="off" required>
						</p>
						<label class="label">Your email</label>
						<p class="control">
						  <input class="input" type="email" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="off" required>
						</p>
						<p class="control">
					    	<button type="submit" class="button is-primary">{{ $submit }}</button>
						</p>
