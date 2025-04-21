@extends('admin.includes.master')
@section('title', 'Model')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h3 class="page-title">Model List</h3>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Vehicle Settings</a></li>
                    <li class="breadcrumb-item active">Models</li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- Form --}}
<div class="row justify-content-center mt-3">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Model</h5>
            </div>
            <form method="POST" action="{{ route('admin.model.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="brand_id" class="form-label">Select Brand</label>
                            <select name="brand_id" required class="form-control" id="brand_id">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="model_name" class="form-label">Model Name</label>
                            <input type="text" name="model_name" class="form-control" placeholder="Enter Model Name" required>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="row justify-content-center mt-4">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Model List</h5>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">S. No.</th>
                                <th scope="col">Brand ID</th>
                                <th scope="col">Model Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $model->brand->brand_name ?? 'N/A' }}</td>

                                    <td>{{ $model->model_name }}</td>
                                    <td>
                                        <div class="dropstart">
                                            <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.model.edit', $model->id) }}">Edit</a></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#"
                                                       onclick="event.preventDefault(); confirmDelete({{ $model->id }})">
                                                        Delete
                                                    </a>
                                                    <form id="delete-form-{{ $model->id }}" action="{{ route('admin.model.destroy', $model->id) }}" method="POST" style="display: none;">
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

{{-- Delete Confirmation Script --}}
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this model?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>

@endsection
