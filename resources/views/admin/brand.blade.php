@extends('admin.includes.master')
@section('title', 'Brands')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h3 class="page-title">Role Lists</h3>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Vehicle Settings</a></li>
                    <li class="breadcrumb-item active">Brands</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Brands</h5>
            </div>

            <form method="POST" action="{{ isset($brand) ? route('admin.brand.update', $brand->id) : route('admin.brand.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($brand))
                    @method('PUT')
                @endif

                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <x-input-box
                                name="brand_name"
                                id="brand_name"
                                label="Brand Name"
                                value="{{ old('brand_name', $brand->brand_name ?? '') }}"
                                required
                            />
                        </div>

                        <div class="col-md-4">
                            <x-input-box
                                name="icon"
                                type="file"
                                id="icon"
                                label="Icon"
                            />
                            @if (isset($brand) && $brand->icon)
                                <img src="{{ asset('storage/' . $brand->icon) }}" alt="Current Icon" width="60" class="mt-2">
                            @endif
                        </div>

                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($brand) ? 'Update' : 'Submit' }}
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
                <h5 class="mb-0">Brand List</h5>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">S. No.</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                    @if($brand->icon)
                                        <img src="{{ asset('storage/' . $brand->icon) }}" width="50" height="50" alt="Brand Icon">
                                    @else
                                        <span>No Icon</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropstart">
                                        <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.brand.edit', $brand->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirmDelete({{ $brand->id }})">
                                                    Delete
                                                </a>
                                                <form id="delete-form-{{ $brand->id }}" action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: none;">
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
