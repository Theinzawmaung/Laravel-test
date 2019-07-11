@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
            <h1 class="">All  Roles</h1>
           @include('includes/status')

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">Name</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($roles as $role)
                  <tr>
                  <th scope="row">{{ $role->name }}</th>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          
        </div>
    </div>
@endsection

@section('title')
    All Roles

   
@endsection