@extends('layouts.webcontent')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Jobs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Jobs Dashboard</li>
        </ol>
    </div>
</main>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Jobs</h4>
                </div>
            <div class="card-body">
                <form action ="{{ url('store-job') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Job Code</label>
                        <input type="text" name="job_code" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Job Title</label>
                        <input type="text" name="job_title" class="form-control">
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