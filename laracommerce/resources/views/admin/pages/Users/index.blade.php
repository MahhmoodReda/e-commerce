@extends('admin.admin-layout')
@section('body')
<div class="page-body">
    @include('sessions.error')
    @include('sessions.success')
    <div class="container-xl">
        <div class="p-3 mb-2 bg-secondary text-white">

            <h2>All Users</h2>
        </div>
        <br>
        <a href="{{ route('admin.create-user') }}" class="mt-2 btn btn-primary mt-xl-0 ">Add User</a>
        <br><br>
        <div class="row row-cards">
            @foreach ($users as $user)

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} <span class="text-primary float-end">
                                {{ $user->type == '1' ? 'Admin' : '' }}
                                <span class="text-danger float-end"> {{ $user->type == '0' ? 'User' : '' }}</span>
                            </span></h5>

                        <p class="card-text">{{ $user->email }}</p>
                        <a href="{{ route('edit-user',$user->id) }}" class="btn btn-primary">View</a>
                        <form action="{{ route('delete-user',$user->id) }}" class="float-end" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger ">delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection