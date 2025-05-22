@extends('admin.includes.master')
@section('title', 'Coupan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Coupan</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Users List</li>
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
                            <div class="d-flex justify-content-end">
                                <button
                                        onclick="window.location.href='{{ route('admin.coupan.create') }}'"
                                        class="btn btn-primary">
                                        + Add Coupan
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="users-table" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Discount Type</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Coupan Type</th>
                                    <th scope="col">Validity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupans as $coupan)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$coupan->title}}</td>
                                    <td>{{$coupan->discount_type}}</td>
                                    <td>{{$coupan->discount}}</td>
                                    <td>{{$coupan->code}}</td>
                                    <td>{{$coupan->coupan_type}}</td>
                                    <td>{{$coupan->validity}}</td>

                                    <td>
                                        <div class="dropstart">
                                            <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.coupan.edit', $coupan->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('admin.coupan.destroy', $coupan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
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
            if (confirm('Are you sure you want to delete this user?')) {
                alert('Deleted user with ID: ' + id);
            }
        }
    </script>



@endsection
