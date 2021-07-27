@extends('layouts/master')
@section('title')
    <title>{{ $modpack->name }} - Technic Solder</title>
@stop
@section('content')
<div class="page-header">
<h1>Modpack Management</h1>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
	Delete Modpack: {{ $modpack->name }}
	</div>
	<div class="panel-body">
		<p>Deleting a modpack is irreversible. All associated builds will be immediately removed. This will remove them from your API. Users with this modpack already on their launcher will be able to continue to use it in "Offline Mode."</p>
		{!! Form::open() !!}
        <form method="post" action="{{URL::Current()}}">
            @csrf
            <button type="submit" class="btn btn-danger">Confirm Deletion</button>
            <a href="/modpack/list/" class="btn btn-primary">Go Back</a>
        </form>
	</div>
</div>
@endsection
