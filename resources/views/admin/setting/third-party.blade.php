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
                        <a href="{{ route('admin.thirdPartyApi', 'mail_config') }}" class="nav-link {{ $page == 'mail_config' ? 'active' : '' }}">
                            Mail Config
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body tab-content">
                @if ($page == 'mail_config')
                <div class="tab-pane fade show active" id="mail-config" role="tabpanel">
                    <form action="{{ route('admin.thirdPartyApiPost')}}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <input type="hidden" name="type" value="{{ $page }}">
                            <div class="col-md-6">
                                <x-input-box name="mailer_name" id="mailer_name" label="Mailer Name" value="{{ getBusinessSetting('mail_config')['mailer_name'] ?? '' }}" placeholder="Enter mailer name" required />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="host" id="host" label="Host" value="{{ getBusinessSetting('mail_config')['host'] ?? '' }}" placeholder="Enter host" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="driver" id="driver" label="Driver" value=" {{ getBusinessSetting('mail_config')['driver'] ?? '' }}" placeholder="Enter driver" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="port" id="port" label="Port" value="{{ getBusinessSetting('mail_config')['port'] ?? '' }}" placeholder="Enter port number" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="username" id="username" label="Username" value="{{ getBusinessSetting('mail_config')['username'] ?? '' }}" placeholder="Enter username" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="email" id="email" label="Email ID" value="{{ getBusinessSetting('mail_config')['email'] ?? '' }}" placeholder="Enter email ID" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="encryption" id="encryption" label="Encryption" value="{{ getBusinessSetting('mail_config')['encryption'] ?? '' }}" placeholder="Enter encryption type" required />
                            </div>
                            <div class="col-md-6 mt-2">
                                <x-input-box name="password" id="password" label="Password" value="{{ getBusinessSetting('mail_config')['password'] ?? '' }}" placeholder="Enter password" required />
                            </div>

                            <div class="col-md-1 mt-2">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
