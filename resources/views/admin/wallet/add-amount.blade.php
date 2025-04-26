@extends('admin.includes.master')
@section('title', 'Role')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Add Wallet Amount</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Role List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                <form action="{{route('admin.wallet.store')}}" method="post">

                    @csrf
                    <div class="card-body">
                        <div class="row align-items-end">

                            <div class="col-md-4">
                                <label for="user_id" class="form-label">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="" selected disabled>--Select User--</option>
                                    @forelse ($users as $user)
                                    <option value="{{ $user->id }}" >
                                        {{ $user->name ?? '' }}
                                    </option>

                                    @empty
                                        <option value="" disabled>No data available!</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-4">
                               <x-input-box name="amount" type="number" label="Amount"  />


                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($amounts as $amount )


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$amount->user->name}}</td>
                                    <td>{{$amount->amount}}</td>
                                    <td>credit</td>
                                    <td>
                                        <div class="dropstart">
                                            <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirmDelete(1)">
                                                        Delete
                                                    </a>
                                                    <form id="delete-form-1" action="#" method="POST" style="display: none;">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmDelete(id) {
                if (confirm('Are you sure you want to delete this user?')) {
                    document.getElementById('delete-form-' + id).submit();
                }
            }
        </script>
    </div>
@endsection
