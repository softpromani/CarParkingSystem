@extends('admin.includes.master')
@section('title', 'Permission')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Role Has Permission
                    lists
                </h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">ROle Permission</li>
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
                <form action="{{ route('admin.fetchPermission') }}" method="post">
                    @csrf
                    @if (isset($editpermission))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <select name="role" class="form-select" onChange='permissions(this)'>
                                    <option value="" selected hidden>--Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary">Fetch</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (isset($selectrole))
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.assignPermission') }}" method="post">
                            @csrf
                            <input type="hidden" name='roleid' value="{{ $selectrole->id }}">
                            <table id="utable" class="table border-0 custom-table comman-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Permissions Name</th>
                                        <th>Menu</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!isset($modules))
                                        <tr>
                                            <td colspan="7">No permission assigned</td>
                                        </tr>
                                    @else
                                        @foreach ($modules as $pname)
                                            <tr>
                                                <td>
                                                    {{ $pname->name }}
                                                </td>
                                                @foreach ($pname->permissions as $permission)
                                                    <td>
                                                        <input type="checkbox" class="form-check"
                                                            value="{{ $permission->name }}" name='rolepermissions[]'
                                                            {{ $selectrole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <div class="text-end m-5">
                                <input class="btn btn-primary p-2" type="submit" value="Update Permission">
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
    @endif



@endsection
