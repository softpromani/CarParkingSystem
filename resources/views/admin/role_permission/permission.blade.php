@extends('admin.includes.master')
@section('title', 'Permission')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Permission
                    lists
                </h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Permission</li>
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
                        <div class="col-md-12">
                            <h5 class="mb-0">Create Permission</h5>
                        </div>
                    </div>
                </div>
                <form
                    action="{{ isset($editpermission) ? route('admin.permissions.update', $editpermission->id) : route('admin.permissions.store') }}"
                    method="post">
                    @csrf
                    @if (isset($editpermission))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="permission" id="permission" label="Name"
                                    value="{{ old('permission', $editpermission->name ?? '') }}" required />


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
                <div class="card-header">
                    <div class="row align-items-center">

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="permission-table" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>



                        </table>
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
            $('#permission-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.permissions.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'created_time',
                        name: 'created_time',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        </script>


    </div>



@endsection
