@extends('layouts.webcontent')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Profile Dashboard</li>
        </ol>
    </div>
</main>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Profile</h4>
                </div>
            <div class="card-body">
                <form action ="{{ url('store-profile') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control">
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