@extends('admin.includes.master')
@section('title', 'User List')
@section('style')


    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}">

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Users
                    lists
                </h3>
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

                            <div class="d-flex justify-content-end "> <button
                                    onclick="window.location.href='{{ route('admin.user.create') }}'"
                                    class="btn btn-primary">
                                    + Add User
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        </thead>
                        <table id="myTable" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>



                            </tbody>
                        </table>


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'first_name', name: 'first_name', searchable: true },
                    { data: 'last_name', name: 'last_name', searchable: true  },
                    { data: 'email', name: 'email', searchable: true  },
                    { data: 'mobile_number', name: 'mobile_number', searchable: true  },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        // Delete function
        function deleteUser(id) {
    var newurl = "{{ route('admin.user.destroy', ':id') }}".replace(':id', id);

    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: newurl,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#myTable').DataTable().ajax.reload(); // Table ID check: 'myTable' not 'mytable'
                } else {
                    alert('Failed to delete!');
                }
            },
            error: function(xhr) {
                alert("Something went wrong!");
            }
        });
    }
}

        </script>

@endsection
