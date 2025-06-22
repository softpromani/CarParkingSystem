@extends('admin.includes.master')
@section('title', 'Business Settings')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Business Settings</h3>
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


    <form method="POST" action="{{ route('admin.business-setting.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Business Information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="company_name" id="company_name" label="Company Name" required
                                    value="{{ getBusinessSetting('company_name') }}" />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="phone" id="phone" label="Phone"
                                    value="{{ getBusinessSetting('phone') }}" />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="email" id="email" label="Email"
                                    value="{{ getBusinessSetting('email') }}" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="country" id="country" label="Country"
                                    value="{{ getBusinessSetting('country') }}" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="company_address" id="company_address" label="Company Address"
                                    value="{{ getBusinessSetting('company_address') }}" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="company_copyright_text" id="company_copyright_text"
                                    label="Company Copyright Text"
                                    value="{{ getBusinessSetting('company_copyright_text') }}" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="header_text" id="header_text" label="Header Text"
                                    value="{{ getBusinessSetting('header_text') }}" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-input-box name="footer_text" id="footer_text" label="Footer text-center"
                                    value="{{ getBusinessSetting('footer_text') }}" />
                            </div>


                        </div>
                    </div>

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


                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <x-input-box name="primary_color_1" type="color" id="primary_color_1"
                                    label="Primary Color" class="form-control form-control-lg"
                                    value="{{ getBusinessSetting('primary_color_1') }}" required
                                    style="height: 70px; width: 120px;" />
                            </div>
                            <div class="col-md-6">
                                <x-input-box name="secondary_color_1" type="color" id="secondary_color_1"
                                    label="Secondary Color" class="form-control form-control-lg"
                                    value="{{ getBusinessSetting('secondary_color_1') }}" required
                                    style="height: 70px; width: 120px;" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Website Header Logo</h5>
                    </div>


                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="website_header_logo" type="file" id="website_header_logo"
                                    label="Header Logo" class="form-control form-control-lg" style="height: 50px;" />
                                @if (getBusinessSetting('website_header_logo'))
                                    <img src="{{ asset('storage/' . getBusinessSetting('website_header_logo')) }}"
                                        style="width: 80px; height:80px; border-radius: 5px;" class="mt-2" />
                                @endif
                            </div>

                        </div>
                    </div>

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


                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="website_footer_logo" type="file" id="website_footer_logo"
                                    label="Footer Logo" class="form-control form-control-lg" style="height: 50px;" />
                                @if (getBusinessSetting('website_footer_logo'))
                                    <img src="{{ asset('storage/' . getBusinessSetting('website_footer_logo')) }}"
                                        style="width: 80px; height:80px; border-radius: 5px;" class="mt-2" />
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Website Favicon</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <x-input-box name="website_favicon" type="file" id="website_favicon" label="Favicon"
                                    class="form-control form-control-lg" style="height: 50px;" />
                                @if (getBusinessSetting('website_favicon'))
                                    <img src="{{ asset('storage/' . getBusinessSetting('website_favicon')) }}"
                                        style="width: 80px; height:80px; border-radius: 5px;" class="mt-2" />
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <button type="submit" class="btn btn-warning mb-3">
                    Update
                </button>
            </div>
        </div>
    </form>




@endsection
