@extends('admin.admin-layout')
@section('body')
@include('sessions.success')
@include('sessions.error')
    <div class="container">
        <form action="{{ route('slider.create') }}" method="get">
            @csrf
            <button class="mt-2 btn btn-primary mt-xl-0" type="submit">Add Slider</button>
        </form><br><br>
        <div class="card-header">
            <h2>Sliders</h2>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $sliders as $slider )
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>{{ $slider->type == '0'?'HomeSlider':'HotDeals' }}</td>
                                        <td>
                                            <img src="{{ asset("storage/$slider->image") }}" alt="" style="width:80px;height:80px">
                                        </td>
                                        <td>
                                            <div class="btn-toolbar">
                                                <form action="{{ route('slider.edit',$slider->id) }}"
                                                    method="get">
                                                    @csrf
                                                    <button class="btn btn-success" type="submit">Edit</button>
                                                </form>
                                                <form action="{{ route('slider.destroy',$slider->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="return confirm('Are You Sure , you want to delete this ?')" class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No sliders Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
