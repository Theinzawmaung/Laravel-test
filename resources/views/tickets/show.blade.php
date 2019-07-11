@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
            
        <hr>
        
        
        <div class="card" style="margin:33px  0;">
            <h2 class="card-header"> {{ $ticket->title }} </h2>
            <div class="card-body">
                    @include('includes/message')
                <h5 class="card-title">saaaaa</h5>
                <p><strong>Status:</strong>{{ $ticket->status? 'Opened':'Closed' }}</p>
            <p class="card-text">{{ $ticket->content }}</p>
            <a href="{{ Route('admin.tickets.edit',$ticket->slug) }}" class="btn btn-primary">Edit</a>
            
            <a href="#" class=" btn btn-danger" onclick="javascript: event.preventDefault(); document.getElementById('delete-form').submit();">
                Delete
            </a>
            
           
            <form action="{{Route('admin.tickets.destroy',$ticket->slug) }}" method="POST" id="delete-form" style="display:none">
                @csrf
                @method('DELETE')
            </form>
            </div>
        </div>

        @foreach ($comments as $comment)
        <div class="card" style="margin:33px 0;">
            <div class="card-body">
            {{ $comment->comment }}
            </div>
        </div>
        @endforeach
            
        
        <div class="card">
            <h5 class="card-header">Replay</h5>
            <div class="card-body">
                    @include('includes/status')
            <form action="{{ Route('newComment',$ticket->slug) }}" method="post">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" name="post_id" value="{{ $ticket->id }}">
                        <textarea name="comment" id="" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <input type="reset" class="btn btn-light" value="Cancel">
                    <input type="submit" class="btn btn-primary" value="Post">
                </form>
            </div>

      
        </div>
         
          
     </div>
    </div>
@endsection

@section('title')
    Single Tickets

   
@endsection