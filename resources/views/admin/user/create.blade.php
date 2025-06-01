@extends('admin.includes.master')
@section('title', 'User')
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
                            <h4 class="card-title">{{ isset($edituser) ? 'Update' : 'Create' }} User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form
                        action="{{ isset($edituser) ? route('admin.user.update', $edituser->id) : route('admin.user.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($edituser))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <x-input-box name="first_name" label="First Name" placeholder="Enter first name"
                                    value="{{ old('first_name', $edituser->first_name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="last_name" label="Last Name" placeholder="Enter last name"
                                    value="{{ old('last_name', $edituser->last_name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="email" label="Email" placeholder="Enter Email"
                                    value="{{ old('email', $edituser->email ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="mobile_number" label="Mobile No." placeholder="Enter mobile no."
                                    value="{{ old('mobile_number', $edituser->mobile_number ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-select-box label="Assign Role" id="role" name="role_id" :options="$roles"
                                    placeholder="--Select Role--" :selected="old(
                                        'role_id',
                                        isset($edituser) ? $edituser->roles->first()->id ?? '' : '',
                                    )" required />
                            </div>
                        </div>

                        <button class="btn btn-primary mt-2"> {{ isset($edituser) ? 'Update' : 'Submit' }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
