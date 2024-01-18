<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Medplus</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

<style>
  .search::placeholder{
    text-align: center;
  }
  a{
    text-decoration: none;
    font-size: 22px;
    font-weight:900;
    font-family: Arial, sans-serif;
color: black;
  }
  .four_box{
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: all 0.3s ease;
  }
.four_box:hover{
  background-color: greenyellow!important;
}
.four_box_text:hover{
  background-color: #55B4B0!important;
}
</style>
</head>

<body>
  <!-- background-size: cover; -->
  <!-- Navbar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="/">
        <img
          src="{{ asset('images/logo.png') }}"
          height="60"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
    @php $user_details=Auth::user();
    {{$user_details;}} 
    @endphp
    @if(isset($user_details))
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/myorders">My orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Track Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Support</a>
        </li>
      </ul>
      @endif
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    @if(isset($user_details))
    <ul class="navbar-nav ms-auto d-flex flex-row">
      <!-- Notification dropdown -->
      <li class="nav-item dropdown mt-4" id="userprofile1" style="margin-right: 80px;">
      <span style="font-size: 22px;font-weight: 600; line-height: 1.5;text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">@php echo $user_details->name @endphp</span>
      </li>
      <li class="nav-item dropdown mt-4" id="userprofile2" style="margin-right: 80px;">
        <a type="button" href="/showcart" class="alert alert-success"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>Cart</a>
      </li>
      <!-- Avatar -->
      <li class="nav-item dropdown" id="userprofile" style="margin-right: 80px;">
        <a
          class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
            class="rounded-circle"
            height="55"
            alt="Avatar"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
          id="userprofile_dropdown"
        >
          <li>
            <a class="dropdown-item" href="/userdetails">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="/logoutuser">Logout</a>
          </li>
        </ul>
      </li>
    </ul>
    
      @else
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a type="button" href="/signup" class="btn btn-outline-success" style="font-size: 10px;">Signup</a>
        <a type="button"  href="/login" class="btn btn-outline-info" style="margin-left: 5%!important; font-size: 10px;">Login</a>
        </div>
        @endif
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar ends -->
<script>
  $(document).ready(function(){
    $("#manageproducts_sub").hide();
    $("#userprofile").click(function(){
      $("#userprofile_dropdown").toggle();
    });
    $("#manageproducts").click(function(){
 $("#manageproducts_sub").toggle();
    });
  });
  </script>