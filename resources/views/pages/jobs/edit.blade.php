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
                <form action ="{{ url('update-job/'.$job->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="">Job Code</label>
                        <input type="text" name="job_code" value="{{ $job->job_code }}" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Job Title</label>
                        <input type="text" name="job_title" value="{{ $job->job_title }}"  class="form-control">
                    </div>
                    
                     <div class="form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3">{!!   $job->description !!}</textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="active" {{ $job->active == 1 ? 'checked':''}} >
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