@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
            <h1 class="">All  Tickets</h1>
           @if ($posts->isEmpty())
             <p>There is no posts.</p>
             @else
             @foreach ($posts as $post)
             <div class="card" style="margin:33px 0;">
                 <div class="card-body">
                 <h4 class="card-title">{{ $post->title }}</h4>
                 <p>{{ \Illuminate\Support\Str::limit($post->content,100, '.....')}}</p>
                 <a href="#" class="btn btn-light">Read More</a>
                 
                 </div>
             </div>
             @endforeach
               
           @endif
          
        </div>
    </div>
@endsection

@section('title')
    All Tickets

   
@endsection