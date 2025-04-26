@extends('admin.includes.master')
@section('title', 'Create User')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Add Customer</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Customer</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">



                <div class="card-body pt-0">
                    <div class="card-header">
                    <form action="{{ isset($editcustomer) ? route('admin.customer.update', $editcustomer->id) : route('admin.customer.store') }}" method="POST">
                        @csrf
                        @if (isset($editcustomer))
                            @method('PUT') <!-- Add PUT method since we are updating -->
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <x-input-box name="first_name" label="First Name" placeholder="Enter first name"
                                    value="{{ old('first_name', $editcustomer->first_name ?? '') }}" required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="last_name" label="Last Name" placeholder="Enter last name"
                                    value="{{ old('last_name', $editcustomer->last_name ?? '') }}" required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="email" label="Email" placeholder="Enter email"
                                    value="{{ old('email', $editcustomer->email ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="billing_address" label="Billing Address"
                                    placeholder="Enter Billing Address"
                                    value="{{ old('billing_address', $editcustomer->billing_address ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="sitting_address" label="Sitting Address"
                                    placeholder="Enter Sitting Address"
                                    value="{{ old('sitting_address', $editcustomer->sitting_address ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="phone" label="Mobile No." placeholder="Enter mobile no."
                                    value="{{ old('phone', $editcustomer->phone ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="pin_code" label="Pin Code" placeholder="Enter pin code"
                                    value="{{ old('pin_code', $editcustomer->pin_code ?? '') }}" required />
                            </div>
                        </div>

                        <button class="btn btn-primary mt-2">{{ isset($editcustomer) ? 'Update' : 'Submit' }}</button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
