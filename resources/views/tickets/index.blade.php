@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
            <h1 class="">All  Posts</h1>
           @include('includes/status')

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">title</th>
                      <th scope="col">status</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                  <tr>
                  <th scope="row">{{ $ticket->id }}</th>
                  
                 <td><a href="{{ Route('admin.tickets.show',$ticket->slug) }}"> {{ $ticket->title }} </a></td>
                        
                      
                      <td>{{ $ticket->status? 'Opened':'Closed' }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          
        </div>
    </div>
@endsection

@section('title')
    Al

   
@endsection