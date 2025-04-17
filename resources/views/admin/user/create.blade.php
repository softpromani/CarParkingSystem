@extends('admin.includes.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Users</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
              </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Create User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
<form action="">
    <div class="row">
    <div class="col-md-4">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name"  name="first_name">
    </div>
    <div class="col-md-4">
        <label for="second_name" class="form-label">Second Name</label>
        <input type="text" class="form-control" id="second_name"  name="second_name">
    </div>
    <div class="col-md-4">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email"  name="email">
    </div>
    <div class="col-md-4">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone"  name="phone">
    </div>
</div>
    <button class="btn btn-primary mt-2">Submit</button>
</form>

                </div>
            </div>
        </div>
   </div>
@endsection
