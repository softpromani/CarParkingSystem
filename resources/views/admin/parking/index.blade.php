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
                        <table id="myTable" class="table table-bordered table-hover align-middle">
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

                           </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
@endsection

@section('script')

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.parking.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name', searchable: true },
                    { data: 'image', name: 'image', searchable: true  },
                    { data: 'address', name: 'address', searchable: true  },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        // Delete function
        function deleteUser(id) {
    var newurl = "{{ route('admin.parking.destroy', ':id') }}".replace(':id', id);

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
