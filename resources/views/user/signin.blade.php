@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign In</h1>
		@if(count($errors) > 0)

			<div class="alert alert-danger">
				
				@foreach($errors->all() as $error)

					<p>{{ $error }}</p>

				@endforeach

			</div>

		@endif
		<form action="{{ route('user.signin') }}" method="post">
			<div class="form-group">
				<label for="Email">Your E-mail</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Your Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Sign In</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
</div>

@endsection