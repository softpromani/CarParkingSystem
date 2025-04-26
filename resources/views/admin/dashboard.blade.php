@extends('admin.includes.master')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a>
                    </li><!--end nav-item-->
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                        <i class="iconoir-dollar-circle fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Total Bookings</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                        </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flexjustify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-info-subtle text-info thumb-md rounded-circle">
                        <i class="iconoir-cart fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Total Users</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-warning-subtle text-warning thumb-md rounded-circle">
                        <i class="iconoir-percentage-circle fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Total Parkings</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-danger"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Total Earnings</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                           </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">$0.00</h3>
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

    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Total Admin Commission</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">$0.00</h3>
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

    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Booking Placed</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">10</h3>
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

    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Booking Placed</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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

    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Booking Completed</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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

    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 bg-danger-subtle text-danger thumb-md rounded-circle">
                        <i class="iconoir-hexagon-dice fs-4"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate">
                        <p class="text-dark mb-0 fw-semibold fs-14">Today's Booking Cancelled</p>
                        <p class="mb-0 text-truncate text-muted"><span class="text-success"></span>
                            </p>
                    </div><!--end media-body-->
                </div><!--end media-->
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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


</div>
<!--end row-->

<div class="row">
    <!-- Recent Bookings -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Recent Bookings</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Booking ID</th>
                            <th>User</th>
                            <th>Parking</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>dcb58b5</td>
                            <td>Menil S</td>
                            <td class="text-danger">Om Parking</td>
                            <td>Tue Aug 27 2024<br>4:48:03 PM</td>
                        </tr>
                        <tr>
                            <td>c62c900</td>
                            <td>Gautami patel</td>
                            <td class="text-danger">Jonson Parking</td>
                            <td>Tue Aug 27 2024<br>4:48:03 PM</td>
                        </tr>
                        <tr>
                            <td>a4ce0b1</td>
                            <td>Mamta Siddhi</td>
                            <td class="text-danger">Ganesh</td>
                            <td>Tue Aug 27 2024<br>4:48:03 PM</td>
                        </tr>
                        <tr>
                            <td>a2971d0</td>
                            <td>Rushabh Patel</td>
                            <td class="text-danger">Science Center Parking</td>
                            <td>Tue Aug 27 2024<br>4:48:03 PM</td>
                        </tr>
                        <tr>
                            <td>9a065c9</td>
                            <td>Jonny User</td>
                            <td class="text-danger">Sevensky mall parking</td>
                            <td>Tue Aug 27 2024<br>4:48:03 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Top Parkings -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Top Parkings</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/02.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="Parking Image"></td>
                            <td class="text-danger">Jim's Parking</td>
                            <td>⭐ ⭐ ⭐ ⭐ ☆</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/02.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="User Icon"></td>
                            <td class="text-danger">Estacionamiento Juquilita</td>
                            <td>⭐ ⭐ ⭐ ⭐ ☆</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/03.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="Gym Icon"></td>
                            <td class="text-danger">Mohamed Ahmed</td>
                            <td>⭐ ☆ ☆ ☆ ☆</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/04.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="Image"></td>
                            <td class="text-danger">Le Trong Tan</td>
                            <td>⭐ ⭐ ⭐ ⭐ ⭐</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/05.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="Broken image"></td>
                            <td class="text-danger">Bay Lên Việt Nam</td>
                            <td>⭐ ⭐ ⭐ ⭐ ☆</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('admin/assets/images/products/06.png')}}" style="height: 50px; width: 50px; " class="rounded" alt="Broken image"></td>
                            <td class="text-danger">Bay Lên Việt Nam</td>
                            <td>⭐ ⭐ ⭐ ⭐ ☆</td>
                            <td><button class="btn btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
