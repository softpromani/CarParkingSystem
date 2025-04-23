@extends('admin.includes.master')
@section('title', 'Parking-Facilities')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Parking Facility</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Parking Facilities</a></li>
                        <li class="breadcrumb-item active">Parking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Parking Facilities</h5>
                </div>

                <form method="POST" action="{{isset($parking) ? route('admin.parking-facility.update', $parking->id) : route('admin.parking-facility.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if (isset($parking))
                    @method('PUT')
                @endif

                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="name" id="name" label="Name"
    value="{{ old('name', $parking->name ?? '') }}" required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="image" type="file" id="image" label="Icon" />
                                @if (isset($parking) && $parking->image)
                                    <img src="{{ asset('storage/' . $parking->image) }}" alt="Current Icon" width="60"
                                        class="mt-2">
                                @endif
                            </div>

                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($parking) ? 'Update' : 'Submit' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Parking List</h5>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parkings as $parking)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $parking->name }}</td>
                                        <td>
                                            @if ($parking->image)
                                                <img src="{{ asset('storage/' . $parking->image) }}" width="50"
                                                    height="50" alt="Brand Icon">
                                            @else
                                                <span>No Icon</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropstart">
                                                <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.parking-facility.edit', $parking->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                            onclick="event.preventDefault(); confirmDelete({{ $parking->id }})">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $parking->id }}"
                                                            action="{{ route('admin.parking-facility.destroy', $parking->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this brand?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
