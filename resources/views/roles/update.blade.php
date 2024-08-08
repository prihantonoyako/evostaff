@extends('layouts.pages')

@section('content-info')
<div class="row">
    <div class="col-6">
    <form action="{{ $actionNavigation['urlUpdate'] }}" class="form-horizontal" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" placeholder="Enter name" value="{{ $data->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="path" class="col-sm-2 col-form-label">Path</label>
                <div class="col-sm-10">
                    <input name="path" type="text" class="form-control" placeholder="Enter path" value="{{ $data->path }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input name="icon" type="text" class="form-control" placeholder="Enter icon" value="{{ $data->icon }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="order" class="col-sm-2 col-form-label">Order</label>
                <div class="col-sm-10">
                    <input name="order" type="number" min="0" class="form-control" value="{{ $data->order }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" row="3" placeholder="{{ $data->description }}"></textarea>
                </div>
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
    </form>
    </div>
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
</div>

@endsection