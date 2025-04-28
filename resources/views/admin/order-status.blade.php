@extends('admin.includes.master')
@section('title', 'Order Status')
@section('style')
<!-- DataTables CSS -->
<link rel="stylesheet" href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}">

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Order Status</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Order Status</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header"></div>
                <form
                    action="{{ isset($editorder) ? route('admin.order-status.update', $editorder->id) : route('admin.order-status.store') }}"
                    method="post">
                    @csrf
                    @if (isset($editorder))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="name" id="name" label="Name"
                                    value="{{  old('name', $editorder->name ?? '')}}" required />
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
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
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.order-status.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                } // Add action column
            ]
        });
    });

    function deleteUser(id) {
    var newurl = "{{ route('admin.order-status.destroy', ':id') }}".replace(':id', id);

    if (confirm("Are you sure you want to delete this order status?")) {
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
