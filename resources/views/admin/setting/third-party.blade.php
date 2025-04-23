@extends('admin.includes.master')
@section('title', 'Third Party API')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h3 class="page-title">Third Party API</h3>
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Business Setting</a></li>
                    <li class="breadcrumb-item active"> Third Party API</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#mail-config" class="nav-link active" data-bs-toggle="tab" role="tab" aria-controls="about" aria-selected="true">
                            Mail Config
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane fade show active" id="mail-config" role="tabpanel">
                    <form action="#" method="">
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <x-input-box name="mailer_name" id="mailer_name" label="Mailer Name" value="" placeholder="Enter mailer name" required />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="host" id="host" label="Host" value="" placeholder="Enter host" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="driver" id="driver" label="Driver" value="" placeholder="Enter driver" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="port" id="port" label="Port" value="" placeholder="Enter port number" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="username" id="username" label="Username" value="" placeholder="Enter username" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="email" id="email" label="Email ID" value="" placeholder="Enter email ID" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="encryption" id="encryption" label="Encryption" value="" placeholder="Enter encryption type" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="password" id="password" label="Password" value="" placeholder="Enter password" required />
                            </div>

                            <div class="col-md-1 mt-2">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
