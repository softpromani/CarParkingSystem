@extends('admin.includes.master')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Mifty</a>
                    </li><!--end nav-item-->
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                        <i class="iconoir-dollar-circle fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Total Revenue</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success">8.5%</span>
                            Increase from last month</p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">$8365.00</h3>
                    </div>
                    <!--end col-->
                    <div class="col align-self-center">
                        <img src="{{asset('admin/assets/images/extra/line-chart.png')}}" alt="" class="img-fluid">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-info-subtle text-info thumb-md rounded-circle">
                        <i class="iconoir-cart fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">New Order</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success">1.7%</span>
                            Increase from last month</p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">865</h3>
                    </div>
                    <!--end col-->
                    <div class="col align-self-center">
                        <img src="{{asset('admin/assets/images/extra/bar.png')}}" alt="" class="img-fluid">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-warning-subtle text-warning thumb-md rounded-circle">
                        <i class="iconoir-percentage-circle fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Sessions</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-danger">0.7%</span>
                            Decrease from last month</p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">155</h3>
                    </div>
                    <!--end col-->
                    <div class="col align-self-center">
                        <img src="{{asset('admin/assets/images/extra/donut.png')}}" alt="" class="img-fluid">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Avg. Order value</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success">2.7%</span>
                            Increase from last month</p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">$12550.00</h3>
                    </div>
                    <!--end col-->
                    <div class="col align-self-center">
                        <img src="{{asset('admin/assets/images/extra/tree.png')}}" alt="" class="img-fluid">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Monthly Avg. Income</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icofont-calendar fs-5 me-1"></i> This Month<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div id="monthly_income" class="apex-charts"></div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Customers</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="img-group d-flex">
                            <a class="user-avatar position-relative d-inline-block" href="#">
                                <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                            </a>
                            <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                <img src="{{asset('admin/assets/images/users/avatar-2.jpg')}}" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                            </a>
                            <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                <img src="{{asset('admin/assets/images/users/avatar-4.jpg')}}" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                            </a>
                            <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                <img src="{{asset('admin/assets/images/users/avatar-3.jpg')}}" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                            </a>
                            <a href="" class="user-avatar position-relative d-inline-block ms-1">
                                <span class="thumb-md shadow-sm justify-content-center d-flex align-items-center bg-info-subtle rounded-circle fw-semibold fs-6">+6</span>
                            </a>
                        </div>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div>
            <div class="card-body pt-0">
                <div id="customers" class="apex-charts"></div>
                <div class="bg-light py-3 px-2 mb-0 mt-3 text-center rounded">
                    <h6 class="mb-0"><i class="icofont-calendar fs-5 me-1"></i>  01 January 2024 to 31 December 2024</h6>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div>
<!--end row-->

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Top Selling by Country</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icofont-calendar fs-5 me-1"></i> This Month<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/us_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">USA</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 85%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">85%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$5860.00</span></td>
                            </tr><!--end tr-->
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/spain_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">Spain</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 78%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">78%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$5422.00</span></td>
                            </tr><!--end tr-->
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/french_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">French</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 71%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">71%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$4587.00</span></td>
                            </tr><!--end tr-->
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/germany_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">Germany</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 65%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">65%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$3655.00</span></td>
                            </tr><!--end tr-->
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/baha_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">Bahamas</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 48%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">48%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$3325.00</span></td>
                            </tr><!--end tr-->
                            <tr class="">
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/flags/russia_flag.jpg')}}" class="me-2 align-self-center thumb-md rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0 text-truncate">Russia</h6>
                                            <div class="d-flex align-items-center">
                                                <div class="progress bg-primary-subtle w-100" style="height:4px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-primary" style="width: 35%"></div>
                                                </div>
                                                <small class="flex-shrink-1 ms-1">35%</small>
                                            </div>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </td>
                                <td  class="px-0 text-end"><span class="text-body ps-2 align-self-center text-end fw-medium">$2275.00</span></td>
                            </tr><!--end tr-->
                        </tbody>
                    </table> <!--end table-->
                </div><!--end /div-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
    <div class="col-md-6 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Popular Products</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icofont-calendar fs-5 me-1"></i> This Year<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div>  <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-top-0">Product</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Sell</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Action</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/products/01.png')}}" height="40" class="me-3 align-self-center rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0">History Book</h6>
                                            <a href="#" class="fs-12 text-primary">ID: A3652</a>
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td>$50 <del class="text-muted fs-10">$70</del></td>
                                <td>450 <small class="text-muted">(550)</small></td>
                                <td><span class="badge bg-primary-subtle text-primary px-2">Stock</span></td>
                                <td>
                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/products/02.png')}}" height="40" class="me-3 align-self-center rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0">Colorful Pots</h6>
                                            <a href="#" class="fs-12 text-primary">ID: A5002</a>
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td>$99 <del class="text-muted fs-10">$150</del></td>
                                <td>750 <small class="text-muted">(00)</small></td>
                                <td><span class="badge bg-danger-subtle text-danger px-2">Out of Stock</span></td>
                                <td>
                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/products/04.png')}}" height="40" class="me-3 align-self-center rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0">Pearl Bracelet</h6>
                                            <a href="#" class="fs-12 text-primary">ID: A6598</a>
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td>$199 <del class="text-muted fs-10">$250</del></td>
                                <td>280 <small class="text-muted">(220)</small></td>
                                <td><span class="badge bg-primary-subtle text-primary px-2">Stock</span></td>
                                <td>
                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/products/06.png')}}" height="40" class="me-3 align-self-center rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0">Dancing Man</h6>
                                            <a href="#" class="fs-12 text-primary">ID: A9547</a>
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td>$40 <del class="text-muted fs-10">$49</del></td>
                                <td>500 <small class="text-muted">(1000)</small></td>
                                <td><span class="badge bg-danger-subtle text-danger px-2">Out of Stock</span></td>
                                <td>
                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('admin/assets/images/products/05.png')}}" height="40" class="me-3 align-self-center rounded" alt="...">
                                        <div class="flex-grow-1 text-truncate">
                                            <h6 class="m-0">Fire Lamp</h6>
                                            <a href="#" class="fs-12 text-primary">ID: A2047</a>
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td>$80 <del class="text-muted fs-10">$59</del></td>
                                <td>800 <small class="text-muted">(2000)</small></td>
                                <td><span class="badge bg-danger-subtle text-danger px-2">Out of Stock</span></td>
                                <td>
                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                </td>
                            </tr><!--end tr-->
                        </tbody>
                    </table> <!--end table-->
                </div><!--end /div-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->
@endsection
