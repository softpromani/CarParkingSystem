@extends('admin.includes.master')
@section('title', 'Admin Settings')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Admin Settings</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Business Settings</a></li>
                        <li class="breadcrumb-item active"> Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Business Information</h5>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf


                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="company_name" id="company_name" label="Company Name" required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="phone" id="phone" label="Phone" />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="email" id="email" label="Email" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="country" id="country" label="Country" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="company_address" id="company_address" label="Company Address" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="company_copyright_text" id="company_copyright_text" label="Company Copyright Text" />
                            </div>


                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- First Card -->
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Website Color</h5>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <x-input-box name="primary_color_1" type="color" id="primary_color_1" label="Primary Color" class="form-control form-control-lg" style="height: 50px;" required />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="secondary_color_1" type="color" id="secondary_color_1" label="Secondary Color" class="form-control form-control-lg" style="height: 50px;" required />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Second Card -->
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Website Header Logo</h5>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="primary_color_2" type="file" id="primary_color_2" label="Primary Color" class="form-control form-control-lg" style="height: 50px;" required />
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- First Card -->
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Website Footer Logo</h5>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="primary_color_1" type="file" id="primary_color_1"  class="form-control form-control-lg" style="height: 50px;" required />
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Second Card -->
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Website Favicon</h5>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="primary_color_2" type="file" id="primary_color_2" label="Primary Color" class="form-control form-control-lg" style="height: 50px;" required />
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-warning mb-3">
         Update
        </button>
    </div>




@endsection
