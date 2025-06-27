@extends('admin.includes.master')
@section('title', 'Guard List')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Guards
                    list
                </h3>
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

                            <div class="d-flex justify-content-end "> <button
                                        onclick="window.location.href='{{ route('admin.guard.create') }}'"
                                        class="btn btn-primary">
                                        + Add Guard
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                    </thead>
                <table id="users-table" class="table table-bordered table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th scope="col">S. No.</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Parking</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->first_name ?? '' }}</td>
                <td>{{ $user->last_name ?? '' }}</td>
                <td>{{ $user->mobile_number ?? '' }}</td>
                <td>
                    {{ $user->parking->name ?? 'N/A' }}
                </td>
                <td>
                    <div class="dropstart">
                        <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.guard.edit', $user->id) }}">Edit</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="event.preventDefault(); confirmDelete({{ $user->id }})">
                                    Delete
                                </a>

                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.guard.destroy', $user->id) }}"
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
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>






@endsection
