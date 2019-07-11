

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href=" {{ url('users/login')}}">Theinzawmaung</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
          </li>
          <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/about') }}">About</a>
          </li>
          <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
          </li>
          
             @if(!Auth::check())
            <li class="nav-item {{ Request::is('users/register') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('users/register') }}">Register</a>
            </li>
            <li class="nav-item {{ Request::is('users/login') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('users/login') }}">Login</a>
            </li>
            @else
            
            @hasanyrole('admin|manager')
            <li class="nav-item {{ Request::is('admin/tickets') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.tickets.index') }}">Tickets</a>
             </li>
             <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.pages.home') }}">Admin</a>
           </li>
             @endhasanyrole()
             
              
            
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="falee">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="#" class="dropdown" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> Logout</a>
                </div>
  
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            
            @endif
        </ul>
      </div>
    </div>
  </nav>