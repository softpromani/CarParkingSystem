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
                         <div class="col-md-4 mt-2">
                                <x-input-box name="latitude" label="Latitude" placeholder="Enter latitude"
                                    value="{{ old('latitude', $editparking->latitude ?? '') }}" required />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="longitude" label="Longitude" placeholder="Enter longitude"
                                    value="{{ old('longitude', $editparking->longitude ?? '') }}" required />
                            </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Select Location on Map</label>
                            <div id="map" style="height: 400px; width: 100%; border: 1px solid #ccc;"></div>
                        </div>
                        </div>
                        <button class="btn btn-primary mt-2"> {{ isset($editparking) ? 'Update' : 'Submit' }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let map, marker;

        function initMap() {
            const defaultLat = parseFloat(document.getElementsByName("latitude")[0]?.value) || 28.6139;
            const defaultLng = parseFloat(document.getElementsByName("longitude")[0]?.value) || 77.2090;

            const defaultLatLng = new google.maps.LatLng(defaultLat, defaultLng);

            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLatLng,
                zoom: 13,
                mapId: "DEMO_MAP_ID" // You can generate your own Map ID if you want advanced styling
            });

            marker = new google.maps.marker.AdvancedMarkerElement({
                position: defaultLatLng,
                map: map,
                gmpDraggable: true,
                title: "Drag me!",
            });

            // When marker is dragged, update lat/lng
            marker.addListener("dragend", (event) => {
                const pos = event.latLng;
                document.getElementsByName("latitude")[0].value = pos.lat().toFixed(6);
                document.getElementsByName("longitude")[0].value = pos.lng().toFixed(6);
            });

            // When map is clicked, move marker and update lat/lng
            map.addListener("click", (event) => {
                marker.position = event.latLng;
                document.getElementsByName("latitude")[0].value = event.latLng.lat().toFixed(6);
                document.getElementsByName("longitude")[0].value = event.latLng.lng().toFixed(6);
            });
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIPxC0f7QBqjt-gkRXxhpLe0Kyk7KaQG8&callback=initMap&libraries=marker"
        async defer>
    </script>
@endsection

