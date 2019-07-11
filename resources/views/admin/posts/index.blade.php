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
                      <th scope="col">Content</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">UPdated_at</th>
                     
                  </tr>
              </thead>
              <tbody>
                  @foreach($posts as $post)
                  <tr>
                  <td scope="row">{{ $post->id }}</td>
                  <td scope="row"><a href="{{route('admin.posts.edit',$post->id)}}">{{ $post->title }}</a></td>
                  <td scope="row">{{ $post->content }}</td>
                  <td scope="row">{{ $post->slug }}</td>
                  <td scope="row">{{ $post->created_at }}</td>
                  <td scope="row">{{ $post->updated_at }}</td>
                  
                  </tr>
                  @endforeach
              </tbody>
          </table>
          
        </div>
    </div>
@endsection

@section('title')
    All Posts

   
@endsection