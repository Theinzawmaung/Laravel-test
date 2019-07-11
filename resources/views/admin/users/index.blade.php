@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
            <h1 class="">All  Users</h1>
           @include('includes/status')

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Roles</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                  <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                 <td><a href="{{ Route('admin.users.edit',$user->id) }}"> {{ $user->email }} </a></td>
                  <td>{{implode(", ", $user->roles()->pluck('name')->all() ) }}</td>      
                      
                      
                  </tr>
                  @endforeach
              </tbody>
          </table>
          
        </div>
    </div>
@endsection

@section('title')
    All Users

   
@endsection