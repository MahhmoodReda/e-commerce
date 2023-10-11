@extends('admin.admin-layout')
@section('body')

<div class=" d-flex aligns-items-center justify-content-center" style="height:100% ; width:100%">


    <div class="card" style="width: 500px">
        <div class="card-body">
            <h4 class="card-title">Edit Form</h4>
            <form action="{{ route('update-user',$user->id) }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="exampleInputUsername1"
                        placeholder="Username">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="exampleInputEmail1" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value="{{ $user->password }}" name="password" id="exampleInputPassword1"
                        placeholder="Password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                    <input type="password" class="form-control" value="{{ $user->password }}" name="password_confirmation" id="exampleInputConfirmPassword1"
                        placeholder="Password">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Select Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="0" {{ $user->type == '0' ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->type == '1' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection