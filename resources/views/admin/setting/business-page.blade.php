@extends('admin.includes.master')
@section('title', 'Business-Page')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Business Page</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Business Setting</a></li>
                        <li class="breadcrumb-item active"> Business Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <form method="POST" action="{{ route('admin.business-setting.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#about" class="nav-link active" data-bs-toggle="tab" role="tab"
                                    aria-controls="about" aria-selected="true">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel">
                            <textarea name="about_us" id="about-text" class="form-control" rows="10" placeholder="Write about us...">{{ getBusinessSetting('about_us') }}</textarea>
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
        </div>
    </div>


@endsection
