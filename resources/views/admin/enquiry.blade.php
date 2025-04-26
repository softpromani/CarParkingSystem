@extends('admin.includes.master')
@section('title', 'Coupan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">User Enquiry</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Users Enquiry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
                                   <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Static Row -->
                                <tr>
                                    <td>1</td>
                                    <td>Summer Sale</td>
                                    <td>Percentage</td>
                                    <td>15%</td>
                                    <td>SUMMER15</td>
                                
                                    <td>
                                        <div class="dropstart">
                                            <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#" onclick="confirmDelete(1)">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more static rows if needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                alert('Deleted item with ID: ' + id);
            }
        }
    </script>
@endsection
