@php
$front = App\Models\FrontControl::first();
@endphp

 
 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="#"><img src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="#"><img src="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="logo" /></a> 
  </div>
  <ul class="nav">
    
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/home')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/')}}" target="_blank">
        <span class="menu-icon">
          <i class="fas fa-eye"></i>
        </span>
        <span class="menu-title">Visit Site </span>
      </a>
    </li> 


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('admin_category')}}"  >
        <span class="menu-icon">
          <i class="fas fa-bars"></i>
        </span>
        <span class="menu-title">Category</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('admin_brand')}}"  >
        <span class="menu-icon">
          <i class="fa-solid fa-bars"></i>
        </span>
        <span class="menu-title">Brand</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
        <span class="menu-icon">
          <i class="fa-solid fa-bars"></i>
        </span>
        <span class="menu-title">Product</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_products_add')}}">Product Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_products_manage')}}">Manage Product</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('admin_discount')}}"  >
        <span class="menu-icon">
          <i class="fa-solid fa-percent"></i>
        </span>
        <span class="menu-title">Discount</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('admin_contact')}}"  >
        <span class="menu-icon">
          <i class="fa-solid fa-comments"></i>
        </span>
        <span class="menu-title">Contacts</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
        <span class="menu-icon">
          <i class="fa-solid fa-book-open"></i>
        </span>
        <span class="menu-title">News</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_news_add')}}">News Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_news_manage')}}">Manage News</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
        <span class="menu-icon">
          <i class="fa-solid fa-address-card"></i>
        </span>
        <span class="menu-title">About</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_descriptoon_add')}}">Description</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_team_add')}}">Add Our Team</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin_team_manage')}}">Manage Our Team</a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('users')}}"  >
        <span class="menu-icon">
          <i class="fa-solid fa-users"></i>
        </span>
        <span class="menu-title">Users</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('admin_front_control')}}"  >
        <span class="menu-icon">
          <i class="fa-solid fa-palette"></i>
        </span>
        <span class="menu-title">Frontend Design</span>
      </a>
    </li>

  
   
  </ul>
</nav>