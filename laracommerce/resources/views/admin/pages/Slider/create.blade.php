@extends('admin.admin-layout')
@section('body')
    <div class="container">
        @include('sessions.error')
        @include('sessions.success')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="card-header">
                <h2>Add Sliders</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <h5>Title</h5>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="slider title">
                                        </div>
                                        @error('title')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <h5>Description</h5>
                                        </label>
                                        <div class="col-sm-9">
                                            <textarea name="description" placeholder="write your description" cols="49" rows="5"></textarea>
                                        </div>
                                        @error('description')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <h5>Type select :</h5>
                                        </label>
                                        <select class="form-label col-sm-9" name="type" id="type" >
                                            <option value="0" class="form-label">HomeSlider</option>
                                            <option value="1">Hot Deals</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <h5>Image</h5>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        @error('image')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
