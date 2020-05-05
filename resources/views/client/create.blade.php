@extends('layouts/master')
@section('title')
    <title>Create Client - Technic Solder</title>
@stop
@section('content')
<h1>Client Management</h1>
<hr>
<div class="panel panel-default">
	<div class="panel-heading">
	Add Client
	</div>
	<div class="panel-body">
		@if ($errors->all())
		    <div class="alert alert-danger">
		    @foreach ($errors->all() as $error)
		        {{ $error }}<br />
		    @endforeach
		    </div>
		@endif
		<div class="row">
			<div class="col-md-6">
				{!! Form::open() !!}
				{!! Form::hidden("add-client", 1) !!}
				<div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="uuid">UUID</label>
                    <input type="text" class="form-control" name="uuid" id="uuid">
                </div>
				{!! Form::submit('Add Client', ['class' => 'btn btn-success']) !!}
				{!! Html::link('client/list/', 'Go Back', ['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection