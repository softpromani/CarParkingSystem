@extends('admin.includes.master')
@section('title', 'Social Media Link')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Social Media</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Business Settings</a></li>
                        <li class="breadcrumb-item active">Social Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                <form action="#" method="post">
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-select-box label="Name" id="user_id" name="user_id" :options="[
                                    'Instagram' => 'Instagram',
                                    'Facebook' => 'Facebook',
                                    'Twitter' => 'Twitter',
                                    'LinkedIn' => 'LinkedIn',
                                    'Snapchat' => 'Snapchat',
                                ]"
                                    placeholder="--Select--" required />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="name" id="name" label="Social Media Link" value="" required />
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

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <!-- Optional header content -->
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="users-table" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>
                                        <div class="dropstart">
                                            <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Repeat static rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
