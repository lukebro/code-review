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
						<label class="label">Your school</label>
						<p class="control">
							<span class="select">
								<select name="school_id" required>
									<option value="">Select a school...</option>
									@foreach ($schools as $school)
										@if ((old('school_id') || $user->school) == $school->id)
											<option value="{{ $school->id }}" selected>{{ $school->name }}</option>
										@else
											<option value="{{ $school->id }}">{{ $school->name }}</option>
										@endif
									@endforeach
								</select>
							</span>
						</p>
						@if (!! $submit)
						<p class="control">
					    	<button type="submit" class="button is-primary">{{ $submit }}</button>
						</p>
						@endif
