@extends('layouts.main')

@section('contact')



  <div class="row justify-content-center">
      <div class="col-md-8">
           
           @include('includes/status')

         <div class="card" style="margin:20px 0;">
           <h4 class="card-header">Manage Users</h4>
           <div class="card-body">
           <a href="{{ route('admin.users.index') }}" class="btn btn-light">View All Users</a>
           </div>
         </div>

         <div class="card" style="margin:20px 0;">
            <h4 class="card-header">Manage Roles</h4>
            <div class="card-body">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-light"> All Roles</a>
              <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create Role</a>
            </div>
          </div>

          <div class="card" style="margin:20px 0;">
            <h4 class="card-header">Manage Categories</h4>
            <div class="card-body">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-light"> All Categories</a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
            </div>
          </div>

          <div class="card" style="margin:20px 0;">
            <h4 class="card-header">Manage Posts</h4>
            <div class="card-body">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-light"> All Posts</a>
              <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create Post</a>
            </div>
          </div>
           
          
        </div>
    </div>
@endsection

@section('title')
    Admin Dashboard

   
@endsection