@extends('admin.includes.master')
@section('title', 'Create Parking')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Users</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Parking</a></li>
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
                            <h4 class="card-title">Create Parking</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form
                        action="{{ isset($editparking) ? route('admin.parking.update', $editparking->id) : route('admin.parking.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($editparking))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="user_id" class="form-label">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="" selected disabled>--Select User--</option>
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ isset($editparking) && $editparking->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name ?? '' }}
                                        </option>

                                    @empty
                                        <option value="" disabled>No data available!</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="name" label="Name" placeholder="Enter name"
                                    value="{{ old('name', $editparking->name ?? '') }}" required />
                            </div>
                            <div class="col-md-4">
                                <x-input-box name="image" type="file" label="Image" placeholder="Upload image"
                                    required />
                                @isset($editparking->image)
                                    <img src="{{ asset('storage/' . $editparking->image) }}" height="50" width="50" />
                                @endisset
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="address" label="Address" placeholder="Enter address"
                                    value="{{ old('address', $editparking->address ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="description" label="Description" placeholder="Enter description"
                                    value="{{ old('description', $editparking->description ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="car_count" label="Car Count" placeholder="Enter car count"
                                    value="{{ old('car_count', $editparking->car_count ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="motorcycle_count" label="Motorcycle Count"
                                    placeholder="Enter motorcycle count"
                                    value="{{ old('motorcycle_count', $editparking->motorcycle_count ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="heavy_vehicle_count" label="Heavy Vehicle Count"
                                    placeholder="Enter heavy Vehicle count"
                                    value="{{ old('heavy_vehicle_count', $editparking->heavy_vehicle_count ?? '') }}"  />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="car_price" label="Car Price" placeholder="Enter car price"
                                    value="{{ old('car_price', $editparking->car_price ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="motorcycle_price" label="Motorcycle price"
                                    placeholder="Enter motorcycle price"
                                    value="{{ old('motorcycle_price', $editparking->motorcycle_price ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="heavy_vehicle_price" label="Heavy Vehicle price"
                                    placeholder="Enter heavy vehicle price"
                                    value="{{ old('heavy_vehicle_price', $editparking->heavy_vehicle_price ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="latitude" label="Latitude" placeholder="Enter latitude"
                                    value="{{ old('latitude', $editparking->latitude ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="longitude" label="Longitude" placeholder="Enter longitude"
                                    value="{{ old('longitude', $editparking->longitude ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="charge_unit" label="Charge Units (in minutes)"
                                    placeholder="Enter Charge Unit"
                                    value="{{ old('charge_unit', $editparking->charge_unit ?? '') }}" required />
                            </div>

                      <div class="col-md-4 mt-2">
                                <x-multi-select-box
                                    name="parking_facility_id"
                                    label="Parking Facilities"
                                    :options="$parkings->pluck('name', 'id')->toArray()"
                                    :selected="old('parkings', $selectedFacilities ?? [])"
                                    
                                />
                            </div>

                        </div>

                        <button class="btn btn-primary mt-2"> {{ isset($editparking) ? 'Update' : 'Submit' }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
