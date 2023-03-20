@extends('layouts.webcontent')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profiles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Profiles Dashboard</li>
        </ol>
    </div>
</main>

<div class="container">
	<div class="col-md-12">
		
		@if(session('status'))
		<div class="alert alert-success">{{ session('status') }}</div>
		@endif
			<form class="d-none d-md-inline-block form-inline ms-auto  my-md-10" action ="{{ url('profiles') }}">
                <div class="input-group">
                    <input class="form-control" type="text" name="search_key" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" value="{{ Session::get('search_key') }}" />
                    <input type="submit" name="submit" class="btn btn-primary" id="btnNavbarSearch" value="Search">
                </div>
            </form>
		<div class="card">
			<div class="card-header">
				Profiles
			</div>

			<div class="card-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Name</th>
					      <th>Address, City</th>
					      <th>Image</th>
					      <th></th>
					      <th></th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($profiles as $profiledata)
					    <tr>
					      <th>{{ $profiledata->id }}</th>
					      <th>{{ $profiledata->name }}</th>
					      <th>{{ $profiledata->address }} {{ $profiledata->city }}</th>
					      <td><img src="{{ asset('uploads/profiles/'.$profiledata->image) }}" width="80px" height="80px"></td>

					      <th><a href="{{ url('edit-profile/'.$profiledata->id) }}" class="btn btn-primary">Edit</a></th>
					      <th><a href="{{ url('delete-profile/'.$profiledata->id) }}" class="btn btn-danger">Delete</a></th>
					    </tr>
					  	@endforeach

					  </tbody>
					</table>
					{{ $profiles->links('pagination::bootstrap-4'); }}
				</div>
		</div>
	</div>
</div>
@endsection