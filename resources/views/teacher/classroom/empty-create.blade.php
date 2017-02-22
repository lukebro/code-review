@extends('layouts.app')

@section('content')

	@component('components.section')
		<div class="columns">
			<div class="column is-6 is-offset-3">
				<h2 class="title is-2">Create a classroom</h2>

						<h4 class="title is-5"><strong>You don't have any organizations on your GitHub account.</strong></h4>
						<p class="control"><a target="_blank" href="https://github.com/organizations/new">Create an organzation on GitHub</a> first, then refresh the page.</p>
						<p class="control">If you don't see you organization here, you have to <a target="_blank" href="https://github.com/settings/connections/applications/{{ env('GITHUB_ID') }}">grant us access</a>.</p>
				</form>
			</div>
		</div>
	@endcomponent

@endsection
