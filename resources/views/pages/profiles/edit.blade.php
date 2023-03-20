@extends('layouts.webcontent')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Jobs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Jobs Update board</li>
        </ol>
    </div>
</main>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Update Job</h4>
                </div>
            @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card-body">
                <form action ="{{ url('update-profile/'.$profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{ $profile->address }}"  class="form-control">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="">City</label>
                        <input type="text" name="city" value="{{ $profile->city }}"  class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Image (File Upload)</label>
                        <input type="file" name="image" class="form-control" >
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="active" {{ $profile->active == 1 ? 'checked':''}} >
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection