@extends('layouts.main')

@section('contact')

<h1 class="text-center">Edit Users</h1>
<hr>
  <div class="row justify-content-center">
      <div class="col-md-6">
            @include('includes/status')
          @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email"
                value="{{$user->email}}">
                </div>
                <div class="form-gropu">
                    <label for="select">Select Roles</label>
                    <select class="form-control" name="role[]" id="select" multiple>
                        @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ in_array($role->name,$selectedRole) ? 'selected' : ''}}>
                        {{ $role->name }}
                    </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <input type="submit"  value="Update" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>
@endsection

@section('title')
    Edit Users

   
@endsection