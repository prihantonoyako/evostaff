@extends('layouts.pages')

@section('pageStyle')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css">
@endsection

@section('content-info')
<form action="{{ $actionNavigation['urlUpdate'] }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        
        <div class="card-body">
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input name="first_name" type="text" class="form-control" placeholder="Enter first name" value="{{ $data->first_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input name="last_name" type="text" class="form-control" placeholder="Enter last name" value="{{ $data->last_name }}">
                </div>
            </div>
            <div class="form-group">
                <label>Department</label>
                <select name="department_id" class="form-control select2" style="width: 100%;">
                    @foreach($departments as $d)
                    <option value="{{$d->id}}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photos">Upload Photo</label>
                <input type="file" id="photos" name="photos" class="dropify" />
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-on-success">
                    @if ($data->status == 1)
                    <input name="status" type="checkbox" class="custom-control-input" id="status" checked>
                    @else
                    <input name="status" type="checkbox" class="custom-control-input" id="status">
                    @endif
                    <label class="custom-control-label" for="status">Status</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ url($actionNavigation['urlMain']) }}">Back</a>
            <button type="submit" class="btn btn-success float-right">Update</button>
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

@section('pageScript')
<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<script>
     $('.dropify').dropify();
</script>
@endsection