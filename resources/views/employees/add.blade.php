@extends('layouts.pages')

@section('content-info')
<form action="{{ $actionNavigation['urlCreate'] }}" class="form-horizontal" method="post">
@csrf
<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        
        <div class="card-body">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input name="first_name" type="text" class="form-control" placeholder="Enter first name">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input name="last_name" type="text" class="form-control" placeholder="Enter last name">
                </div>
            </div>
            <div class="form-group row">
                <label for="department" class="col-sm-3 col-form-label">Department</label>
                <div class="col-sm-9">
                    <input name="department" type="text" class="form-control" placeholder="Enter department">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ url($actionNavigation['urlMain']) }}">Back</a>
            <button type="submit" class="btn btn-success float-right">Create</button>
        </div>
    </div>
    @if ($errors->any())
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Errors
                </h3>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message) 
                <h4>{{ $message }}</h4>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
</form>

@endsection