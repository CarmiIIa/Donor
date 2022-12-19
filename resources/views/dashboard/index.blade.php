@extends('layout')

@section('content')

@if (Auth::check())
<nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" style="color: black" href="#">Donation
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto navbar-right-top">
            <li class="nav-item dropdown nav-user">
    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://i.pinimg.com/736x/17/f0/10/17f01070dcf9691576127f8c57e07130.jpg" alt="" class="rounded-circle" width="35"></a>
    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
        <div class="nav-user-info">
            <p class="mb-0 nav-user-name">{{ Auth::user()->name }}</p>
        </div>
        <a class="dropdown-item" href="/logout">
          <b>Logout</b>     
        </a>
    </div>
             </li>
        </ul>
    </div>
</nav>
@endif
    <div class="card2">

    </div>
    <div class="card1">
  <div class="row ">
    
    <div class="col-lg-9 mx-auto">
        <div>
            <div class="panel-heading"> 
              <div class="h3">Blood Donation</div>
              {{-- <button class="btn btn-light  pull-right"  data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span><a href="{{ url('/create') }}">Create</a>
              </button> --}}
              
                <div class="dropdown rounded">
                  @if (Session::get('successAdd'))
                    <div class="alert alert-success">
                        {{ Session::get('successAdd') }}
                    </div>
                  @endif
                  @if (Session::get('successUpdate'))
                    <div class="alert alert-success">
                        {{ Session::get('successUpdate') }}
                    </div>
                  @endif
                  @if (Session::get('successDelete'))
                    <div class="alert alert-success">
                        {{ Session::get('successDelete') }}
                    </div>
                  @endif
                    
                    {{-- <a href="{{ url('/create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Create</a> --}}
                </div>
            </div>    </div>
      <div class="card mt-2 mx-auto p-4 bg-light">
        <a class="fa-solid fa-plus text-dark" style="font-size: 30px; margin-left: 9px;" href="{{route('create')}}"></a>
        <br>
        <table class="table">
            <thead>
              <tr>
                <td>NIK</td>
                <td>Name</td>
                <td>Age</td>
                <td>Address</td>
                <td>Blood Type</td>
                <td>Total CC</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <thead>
                @foreach ($ddonor as $item)
                <tr>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->age}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->bloodtype}}</td>
                  <td>{{$item->totalcc * 350}} ml</td>
                  <td>
                    {{-- <a href="/edit" class="btn btn-primary">Edit</a> --}}
                    
                    <div class="ml-auto">
                    <form action="{{ route('delete', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="fa-regular fa-pen-to-square text-dark" href="{{route('edit', $item['id'])}}"></a>
                        <button class="fas fa-trash text-danger btn"></button>
                    </form>
                  </div>
                  </td>
                </tr>
              </thead>
            </tbody>
             @endforeach
          </table>
     </div>
      </div>
       
      </div>
          </div>
      
          @endsection