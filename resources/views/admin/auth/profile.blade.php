@extends('admin.includes.master')
@section('title', 'Profile')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Profile</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Mifty</a>
                    </li><!--end nav-item-->
                    <li class="breadcrumb-item"><a href="#">Pages</a>
                    </li><!--end nav-item-->
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-4  rounded text-center img-bg">
            </div><!--end card-body-->
            <div class="position-relative">
                <div class="shape overflow-hidden text-card-bg">
                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>



            <div class="card-body mt-n6">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center">
                            <div class="position-relative">


                                <img src="{{ asset('storage/' . $profile->image) }}" alt="Profile Image"
                                class="rounded-circle img-fluid" style="width: 200px; height: 150px; object-fit: cover;">
                                <div class="position-absolute top-50 start-100 translate-middle">

                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3 align-self-end">
                                <h5 class="m-0 fs-3 fw-bold">{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                            </div>

                        </div><!--end media-->
                        <div class="mt-3">
                            <div class="text-body mb-2  d-flex align-items-center"><i class="iconoir-language fs-20 me-1 text-muted"></i><span class="text-body fw-semibold">Language :</span> English / French / Spanish</div>
                            <div class="text-muted mb-2 d-flex align-items-center"><i class="iconoir-mail-out fs-20 me-1"></i><span class="text-body fw-semibold">Email : {{$profile->email}}</span></div>
                            <div class="text-body mb-3 d-flex align-items-center"><i class="iconoir-phone fs-20 me-1 text-muted"></i><span class="text-body fw-semibold">Phone : </span>{{$profile->mobile_number}}</div>
                            <button type="button" class="btn btn-primary  d-inline-block">Follow</button>
                            <button type="button" class="btn btn-light  d-inline-block">Hire Me</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->

        </div><!--end card-->
       
    </div> <!--end col-->
    <div class="col-lg-8">
        <div class="bg-primary-subtle p-2 border-dashed border-primary rounded mb-3">
            <img src="{{ asset('admin/assets/images/extra/party.gif') }}" alt="" class="d-inline-block me-1"
                height="30">
            <span class="text-primary fw-semibold">Rosa Dodson's</span><span class="text-primary fw-normal"> best
                performance from last year</span>
        </div>
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="iconoir-dollar-circle fs-24 align-self-center text-info me-2"></i>
                            <div class="flex-grow-1 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-13">Total Cost</p>
                                <h3 class="mt-1 mb-0 fs-18 fw-bold">$27,215k <span class="fs-11 text-muted fw-normal">New
                                        365 Days</span> </h3>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div> <!--end card-body-->
            </div><!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="iconoir-cart fs-24 align-self-center text-blue me-2"></i>
                            <div class="flex-grow-1 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-13">Total Order</p>
                                <h3 class="mt-1 mb-0 fs-18 fw-bold">190 <span class="fs-11 text-muted fw-normal">Order
                                        365 Days</span> </h3>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div> <!--end card-body-->
            </div><!--end col-->

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="iconoir-thumbs-up fs-24 align-self-center text-primary me-2"></i>
                            <div class="flex-grow-1 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-13">Completed</p>
                                <h3 class="mt-1 mb-0 fs-18 fw-bold">165 <span class="fs-11 text-muted fw-normal">Comp.
                                        Order 365 Days</span> </h3>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div> <!--end card-->
            </div><!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="iconoir-xmark-circle fs-24 align-self-center text-danger me-2"></i>
                            <div class="flex-grow-1 text-truncate">
                                <p class="text-dark mb-0 fw-semibold fs-13">Cancled</p>
                                <h3 class="mt-1 mb-0 fs-18 fw-bold">25 <span class="fs-11 text-muted fw-normal">Canc.Order
                                        365 Days</span> </h3>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div> <!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
        <ul class="nav nav-tabs mb-3" role="tablist">
            {{-- <li class="nav-item">
                <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#post" role="tab" aria-selected="true">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium" data-bs-toggle="tab" href="#gallery" role="tab" aria-selected="false">Gallery</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#settings" role="tab"
                    aria-selected="true">Settings</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane p-3 active" id="settings" role="tabpanel">
                <form action="{{isset($profile) ? route('admin.profile.update', $profile->id) : route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($profile))
                    @method('PUT')
                @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First
                                    Name</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" name="first_name"
                                        value="{{ old('first_name', $profile->first_name ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last
                                    Name</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" name="last_name"
                                        value="{{ old('last_name', $profile->last_name ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Profile Image</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="file" name="image"
                                        value="{{ old('image', $profile->image ?? '') }}">
                                </div>
                            </div>


                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Contact
                                    Phone</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="las la-phone"></i></span>
                                        <input type="text" class="form-control" name="mobile_number"
                                            value="{{ old('mobile_number', $profile->mobile_number ?? '') }}"
                                            placeholder="Phone">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email
                                    Address</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="las la-at"></i></span>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $profile->email ?? '') }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Website
                                    Link</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="la la-globe"></i></span>
                                        <input type="text" class="form-control" name="website"
                                            value="{{ old('website', $user->website ?? '') }}" placeholder="Website">
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group mb-3 row">
                                <label
                                    class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Country</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select class="form-select" name="country">
                                        <option value="London"
                                            {{ old('country', $user->country ?? '') == 'London' ? 'selected' : '' }}>
                                            London</option>
                                        <option value="India"
                                            {{ old('country', $user->country ?? '') == 'India' ? 'selected' : '' }}>India
                                        </option>
                                        <option value="USA"
                                            {{ old('country', $user->country ?? '') == 'USA' ? 'selected' : '' }}>USA
                                        </option>
                                        <option value="Canada"
                                            {{ old('country', $user->country ?? '') == 'Canada' ? 'selected' : '' }}>
                                            Canada</option>
                                        <option value="Thailand"
                                            {{ old('country', $user->country ?? '') == 'Thailand' ? 'selected' : '' }}>
                                            Thailand</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin.profile.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </form>

                <form action="{{ route('admin.changePassword') }}" method="post">
                    @csrf

                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body pt-0">
                        <!-- Current Password -->
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end form-label">Current Password</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control" type="password" name="current_password" placeholder="Current Password">
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end form-label">New Password</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control" type="password" name="new_password" placeholder="New Password">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end form-label">Confirm Password</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control" type="password" name="new_password_confirmation" placeholder="Confirm New Password">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                                <a href="{{ route('admin.profile.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
    </div><!--end row-->
@endsection
