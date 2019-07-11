@extends('layouts.main')

@section('contact')

<h1 class="text-center">Create a Role</h1>
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
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <input type="submit"  value="Create" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>
@endsection

@section('title')
    Create  Role

   
@endsection