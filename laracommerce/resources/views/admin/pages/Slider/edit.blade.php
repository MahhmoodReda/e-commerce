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
                <h2>Edit Sliders</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <h5>Title</h5>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $slider->title }}"
                                                name="title" placeholder="slider title">
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
                                            <textarea name="description" placeholder="write your description" cols="49" rows="5">
                                                    {{ $slider->description }}
                                                </textarea>
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
                                            <h5>Image</h5>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <img src="{{ asset("storage/$slider->image") }}" style="width:80px;height:80px"
                                            alt="">
                                        @error('image')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
