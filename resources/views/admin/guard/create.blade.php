@extends('admin.includes.master')
@section('title', 'Create Guard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Guard</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Guard</a></li>
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
                            <h4 class="card-title">Create Guard</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ isset($user) ? route('admin.guard.update', $user->id) : route('admin.guard.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <x-input-box name="first_name" label="First Name" placeholder="Enter first name"
                                    value="{{ old('first_name', $user->first_name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="last_name" label="Last Name" placeholder="Enter last name"
                                    value="{{ old('last_name', $user->last_name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="email" label="Email" placeholder="Enter Email"
                                    value="{{ old('email', $user->email ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="mobile_number" label="Mobile No." placeholder="Enter mobile no."
                                    value="{{ old('mobile_number', $user->mobile_number ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="parking_id" class="form-label">Parking</label>
                                <select class="form-control" id="parking_id" name="parking_id" required>
                                    <option value="" disabled
                                        {{ old('parking_id', $user->parking_guard->parking_id ?? '') == '' ? 'selected' : '' }}>
                                        --Select Parking--
                                    </option>
                                    @foreach ($parkings as $parking)
                                        <option value="{{ $parking->id }}"
                                            {{ old('parking_id', $user->parking_guard->parking_id ?? '') == $parking->id ? 'selected' : '' }}>
                                            {{ $parking->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                        <button class="btn btn-primary mt-2"> {{ isset($user) ? 'Update' : 'Submit' }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
