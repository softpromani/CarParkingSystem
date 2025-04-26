@extends('admin.includes.master')
@section('title', 'Customer List')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h3 class="page-title">Customer lists</h3>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Customer List</li>
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
                        <div class="d-flex justify-content-end "> <button
                            onclick="window.location.href='{{ route('admin.customer.create') }}'"
                            class="btn btn-primary">
                            + Add Customer
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
                                <th scope="col">Name</th>
                                <th scope="col">Phone no.</th>
                                <th scope="col">Email</th>
                                <th scope="col">Pin Code</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer )


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>

                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->pin_code}}</td>
                                <td>
                                    <div class="dropstart">
                                        <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin.customer.edit', $customer->id) }}">Edit</a></li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirmDelete({{ $customer->id }})">
                                                    Delete
                                                </a>

                                                <form id="delete-form-{{ $customer->id }}" action="{{ route('admin.customer.destroy', $customer->id) }}" method="POST" style="display: none;">
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
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
