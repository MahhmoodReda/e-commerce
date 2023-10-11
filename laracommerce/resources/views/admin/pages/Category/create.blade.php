@extends('admin.admin-layout')
@section('body')
    <div class="container">
        <div class="card-header">
            <h2>Add Category</h2>
            <div class="card">
                <div class="card-body">
                    <form class="form-sample" action="{{ route('category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                        <h5>Name</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Category Name">
                                    </div>
                                    @error('name')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                        <h5>Slug</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" placeholder="slug">
                                    </div>
                                    @error('slug')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 form-group mr-sm-2">
                                <label>
                                    <h5>Description</h5>
                                </label>
                                <div>
                                    <textarea name="description" cols="120" rows="5" class="form-control" placeholder="Write Description Here"
                                        name="description"></textarea>
                                </div>
                                @error('description')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
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
                        <p class="card-description">
                            SEO TAGS
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                        <h5>Meta-Title</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_title"
                                            placeholder="meta-title">
                                    </div>
                                    @error('meta_title')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                        <h5>Meta-Keyword</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_keyword"
                                            placeholder="meta-keyword">
                                    </div>
                                    @error('meta_keyword')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                        <h5>Meta-Description</h5>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_description"
                                            placeholder="meta-description">
                                    </div>
                                    @error('meta_description')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            ADD
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
