@extends('layouts.main')

@section('contact')

<h1 class="text-center">Edit a Ticket</h1>
<hr>
  <div class="row justify-content-center">
      <div class="col-md-6">
          @if (session('status'))
      <p class="alert alert-success">{{ session('status') }}</p>
          @endif
          @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form method="post">
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $ticket->title }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content">{{ $ticket->content }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-ckeck-input" id="e" name="status"
                    {{ $ticket->status ? '' : 'Checked' }}>
                    <label class="form-check-label" for="e" >Close this ticket?</label>
                </div>
                <input type="submit"  value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

@section('title')
    edit Page

   
@endsection