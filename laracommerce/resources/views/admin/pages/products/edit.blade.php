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
        <div class="card-header">
            <h2>Edit Products</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-header">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="Category-tab" data-bs-toggle="tab"
                                        data-bs-target="#Category" type="button" role="tab" aria-controls="Category"
                                        aria-selected="true">
                                        <h4>Category</h4>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Details-tab" data-bs-toggle="tab" data-bs-target="#Details"
                                        type="button" role="tab" aria-controls="Details" aria-selected="false">
                                        <h4>Details</h4>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Images-tab" data-bs-toggle="tab" data-bs-target="#Images"
                                        type="button" role="tab" aria-controls="Images" aria-selected="false">
                                        <h4>Images</h4>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="SEOTags-tab" data-bs-toggle="tab" data-bs-target="#SEOTags"
                                        type="button" role="tab" aria-controls="SEOTags" aria-selected="false">
                                        <h4>SEO Tags</h4>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Category" role="tabpanel"
                                aria-labelledby="Category-tab">
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div><small class="text-danger">Category is required</small></div>
                                @enderror
                            </div>
                            <div class="tab-pane fade" id="Details" role="tabpanel" aria-labelledby="Details-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputName" class="form-label">
                                            <h5>Name</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputName" name="name"
                                            placeholder="Product Name" value="{{ $product->name }}">
                                        @error('name')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputSlug" class="form-label">
                                            <h5>Slug</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputSlug" name="slug"
                                            placeholder="Product Slug" value="{{ $product->slug }}">
                                        @error('slug')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputDesc" class="form-label">
                                            <h5>Small Description</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputDesc" name="small_description"
                                            placeholder="Product Small Description"
                                            value="{{ $product->small_description }}">
                                        @error('small_description')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputQuantity" class="form-label">
                                            <h5>Quantity</h5>
                                        </label>
                                        <input type="number" class="form-control" id="inputQuantity" name="quantity"
                                            min="1" placeholder="Product Quantity"
                                            value="{{ $product->quantity }}">
                                        @error('quantity')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputDescription" class="form-label">
                                            <h5>Description</h5>
                                        </label><br>
                                        <textarea name="description" id="inputDescription" cols="100" rows="5"
                                            placeholder="Write Your Description Here" class="form-control">
                                            {{ $product->description }}</textarea>
                                        @error('description')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputoriginal" class="form-label">
                                            <h5>Original Price</h5>
                                        </label>
                                        <input type="number" class="form-control" id="inputoriginal"
                                            name="original_price" placeholder="Product Original Price"
                                            value="{{ $product->original_price }}">
                                        @error('original_price')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputselling" class="form-label">
                                            <h5>Selling Price</h5>
                                        </label>
                                        <input type="number" class="form-control" id="inputselling"
                                            name="selling_price" placeholder="Product Selling Price"
                                            value="{{ $product->selling_price }}">
                                        @error('selling_price')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputTrending" class="form-label">
                                            <h5>Trending</h5>
                                        </label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="inputTrending" name="trending">
                                            <option value="{{ $product->trending }}">
                                                {{ $product->trending == 0 ? 'Not Trendy' : 'Trendy' }}</option>
                                            <option value="0">Not Trendy</option>
                                            <option value="1">Trendy</option>
                                        </select>
                                        @error('trending')
                                            <div><small class="text-danger">select trendy or not</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputBrand" class="form-label">
                                            <h5>Brand</h5>
                                        </label>
                                        <select class="form-select" aria-label="Default select example" id="inputBrand"
                                            name="brand_id">
                                            <option value="{{ $product->brand_id }}" selected>{{ $product->brand->name }}
                                            </option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div><small class="text-danger">select brand</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Images" role="tabpanel" aria-labelledby="Images-tab">
                                <label class="form-label">
                                    <h5>Upload Product Images</h5>
                                </label>
                                <input type="file" multiple="multiple" class="form-control" name="image[]">
                                @error('image')
                                    <div><small class="text-danger">{{ $message }}</small></div>
                                @enderror
                                <div>
                                    @if ($product->ProductImage)
                                        <div class="row">
                                            @foreach ($product->ProductImage as $image)
                                                <div class="col-md-2">
                                                    <img class="border me-4" style="width: 80px;height:80px"
                                                        src="{{ asset("storage/$image->image") }}">
                                                        <a class="d-block btn btn-danger btn-sm" style="width: 80px" href="{{ route('product_images.delete',$image->id) }}">
                                                        Delete
                                                        </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>no images found</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="SEOTags" role="tabpanel" aria-labelledby="SEOTags-tab">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="inputmeta_title" class="form-label">
                                            <h5>Meta Title</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputmeta_title"
                                            name="meta_title" placeholder="Product meta_title"
                                            value="{{ $product->meta_title }}">
                                        @error('meta_title')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputmeta_keyword" class="form-label">
                                            <h5>Meta Keyword</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputmeta_keyword"
                                            name="meta_keyword" placeholder="Product meta_keyword"
                                            value="{{ $product->meta_keyword }}">
                                        @error('meta_keyword')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputmeta_description" class="form-label">
                                            <h5>Meta Description</h5>
                                        </label>
                                        <input type="text" class="form-control" id="inputmeta_description"
                                            name="meta_description" placeholder="Product meta_description"
                                            value="{{ $product->meta_description }}">
                                        @error('meta_description')
                                            <div><small class="text-danger">{{ $message }}</small></div>
                                        @enderror
                                        <br><br>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-primary col-md-1">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
