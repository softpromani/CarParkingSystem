@extends('admin.includes.master')
@section('title', 'Create Guard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Trucks</h3>
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
                            <h4 class="card-title">Add Truck</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <form
                        action="{{ isset($editTruck) ? route('admin.truck.update', $editTruck->id) : route('admin.truck.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        @if (isset($editTruck))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <x-input-box name="truck_no" label="Truck Number" placeholder="Enter Truck Number"
                                    value="{{ old('truck_no', $editTruck->truck_no ?? '') }}" required />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="image" label="Truck Image" type="file"
                                    placeholder="Enter Truck Image" required />
                            </div>
                            <div class="col-md-3 mt-2">
                                <x-input-box name="height" label="Height" placeholder="Enter Height"
                                    value="{{ old('height', $editTruck->height ?? '') }}" required />
                            </div>
                            <div class="col-md-3 mt-2">
                                <x-input-box name="width" label="Width" placeholder="Enter Width"
                                    value="{{ old('width', $editTruck->width ?? '') }}" required />
                            </div>
                            <div class="col-md-3 mt-2">
                                <x-input-box name="length" label="Length" placeholder="Enter Length"
                                    value="{{ old('truck_no', $editTruck->truck_no ?? '') }}" required />
                            </div>
                            <div class="col-md-3 mt-2">
                                <x-input-box name="capacity" label="Capacity"
                                    placeholder="Enter Capacity"value="{{ old('length', $editTruck->length ?? '') }}"
                                    required />
                            </div>
                            <div class="col-md-3 mt-2">
                                <x-input-box name="wheel_count" label="Wheel Count" placeholder="Enter Wheel Count"
                                    value="{{ old('wheel_count', $editTruck->wheel_count ?? '') }}" required />
                            </div>
                        </div>

                        <hr>

                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Truck Documents</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <x-input-box name="rc_no" label="RC Number"
                                    value="{{ old('rc_no', $truck->rc_no ?? '') }}" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box name="pollution_no"
                                    label="Pollution Number" value="{{ old('pollution_no', $truck->pollution_no ?? '') }}" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box name="insurance_no" label="Insurance Number"
                                    value="{{ old('insurance_no', $truck->insurance_no ?? '') }}" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box name="fitness_no" label="Fitness Number"
                                    value="{{ old('fitness_no', $truck->fitness_no ?? '') }}" />
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-3">
                                <x-input-box type="file" name="rc" label="RC Document" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box type="file" name="pollution_doc" label="Pollution Document" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box type="file" name="insurance" label="Insurance Document" />
                            </div>
                            <div class="col-md-3">
                                <x-input-box type="file" name="fitness_certificate" label="Fitness Certificate" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
