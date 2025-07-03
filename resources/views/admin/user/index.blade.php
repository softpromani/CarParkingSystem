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
                        <x-data-table id="user-table" :columns="$columns" ajax-url="{{ route('admin.user.index') }}" />
                    </div>

                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')
@endsection
