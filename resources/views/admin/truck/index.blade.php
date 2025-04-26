@extends('admin.includes.master')
@section('title', 'Guard List')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h3 class="page-title">Truck list</h3>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Guards</a></li>
                    <li class="breadcrumb-item active">Guards List</li>
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
                            <button onclick="window.location.href='{{route('admin.truck.create')}}'" class="btn btn-primary">
                                + Add Truck
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
                                <th scope="col">Truck Number</th>
                                <th scope="col">Truck Image</th>
                                <th scope="col">Wheel Count</th>
                               <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($trucks as $truck )


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$truck->truck_no}}</td>
                                <td>
                                    @if($truck->image)
                                        <img src="{{ asset('storage/' . $truck->image) }}" alt="Truck Image" width="80" height="60" style="object-fit: cover;">
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>{{$truck->wheel_count}}</td>

                                <td>
                                    <div class="dropstart">
                                        <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin.truck.edit', $truck->id) }}">Edit</a></li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirmDelete({{ $truck->id }})">Delete</a>
                                                <form id="delete-form-{{ $truck->id }}" action="{{ route('admin.truck.destroy', $truck->id) }}" method="POST" style="display: none;">
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
