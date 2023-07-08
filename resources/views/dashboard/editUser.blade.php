@extends('layouts.admin')

@section('admin')


<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-4">
            <div class="card mb-0">
              <div class="card-body">
                <h4 class="text-center">Update User</h4>
                <form method="post" action="{{route('updateUser')}}">
                  @csrf
                  <input type="hidden" value="{{$users->id}}" name="id">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="name" value="{{$users->name}}" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  @error('name') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{$users->email}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  @error('email') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" value="" class="form-control" id="exampleInputPassword1">
                  </div>
                  @error('pass') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-4">
                  <label for="exampleInputRole" class="form-label">Role</label>
                  
                  <input type="text" name="role" disabled value="{{$users->role->role}}" class="form-control" id="exampleInputPassword1">

                  </div>
             
                  <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update User</button>
               
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   

@endsection