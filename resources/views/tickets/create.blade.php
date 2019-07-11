@extends('layouts.main')

@section('contact')

<h1 class="text-center">Submit a Ticket</h1>
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
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content"></textarea>
                </div>
                <input type="submit"  value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

@section('title')
    Contact Page

   
@endsection