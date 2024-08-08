@extends('layouts.pages')

@section('content-info')
<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        <form>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input id="name" name="name" type="text" class="form-control" value="{{ $data->name }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="path" class="col-sm-2 col-form-label">Path</label>
                <div class="col-sm-10">
                    <input id="path" name="path" type="text" class="form-control" value="{{ $data->path }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input id="icon" name="icon" type="text" class="form-control" value="{{ $data->icon }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="order" class="col-sm-2 col-form-label">Order</label>
                <div class="col-sm-10">
                    <input id="order" name="order" type="number" min="0" class="form-control" value="{{ $data->order }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label disabled">Description</label>
                <div class="col-sm-10">
                    <textarea id="description" name="description" class="form-control" row="3" placeholder="{{ $data->description }}" disabled></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-on-success">
                    @if ($data->status == 1)
                    <input name="status" type="checkbox" class="custom-control-input" id="status" checked disabled>
                    @else
                    <input name="status" type="checkbox" class="custom-control-input" id="status" disabled>
                    @endif
                    <label class="custom-control-label" for="status">Status</label>
                </div>
            </div>
        </div>
        </form>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ url($actionNavigation['urlMain']) }}">Back</a>
            <a class="btn btn-primary float-right" href="{{ url($actionNavigation['urlUpdate']) }}">Update</a>
        </div>
    </div>
</div>

@endsection