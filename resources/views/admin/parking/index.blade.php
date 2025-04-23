@extends('admin.includes.master')
@section('title', 'Parking')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Users List</h3>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Parking Entries</h5>
                    <button onclick="window.location.href='{{ route('admin.parking.create') }}'" class="btn btn-primary">
                        + Add Parking
                    </button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive mt-3">
                        <table id="users-table" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Address</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parkings as $parking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $parking->name ?? '-' }}</td>
                                        <td>
                                            @if($parking->image)
                                            <img src="{{ asset('storage/' . $parking->image) }}" width="50" height="50" class="rounded" alt="Image">
                                        @else
                                            -
                                        @endif

                                        </td>
                                        <td>{{ $parking->address ?? '-' }}</td>


                                        <td>
                                            <div class="dropstart">
                                                <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.parking.edit', $parking->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirmDelete({{ $parking->id }})">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $parking->id }}" action="{{ route('admin.parking.destroy', $parking->id) }}" method="POST" style="display: none;">
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
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
