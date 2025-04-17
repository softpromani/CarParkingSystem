@extends('admin.includes.master')
@section('title', 'Create User')
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
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <x-input-box name="first_name" label="First Name" placeholder="Enter first name" value="{{ old('first_name', $user->first_name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="last_name" label="Last Name" placeholder="Enter last name" value="{{ old('last_name', $user->last_name ?? '') }}" required />
                            </div>

                        </div>
                        <button class="btn btn-primary mt-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
