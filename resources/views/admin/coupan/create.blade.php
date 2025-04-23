@extends('admin.includes.master')
@section('title', 'Create Driver')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Coupan</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Drivers</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Create Coupan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ isset($editcoupan) ? route('admin.coupan.update', $editcoupan->id) : route('admin.coupan.store') }}" method="post">
                        @csrf
                        @if (isset($editcoupan))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <x-input-box name="title" label="Title" placeholder="Enter title"
                                    value="{{ old('title', $editcoupan->title ?? '') }}" required />
                            </div>

                            <div class="col-md-4">
                                <x-select-box label="Discount Type" id="discount_type" name="discount_type"
                                    :options="[
                                        'percentage' => 'Percentage',
                                        'fix' => 'Fix',
                                    ]"
                                    placeholder="--Select--"
                                    :selected="old('discount_type', $editcoupan->discount_type ?? '')"
                                    required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="discount" label="Discount" placeholder="Enter discount"
                                    value="{{ old('discount', $editcoupan->discount ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="code" label="Code" placeholder="Enter code"
                                    value="{{ old('code', $editcoupan->code ?? '') }}" required />
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-select-box label="Coupan Type" id="coupan_type" name="coupan_type"
                                    :options="[
                                        'parking_wise' => 'Parking Wise',
                                        'userwise' => 'Userwise',
                                        'all' => 'All',
                                    ]"
                                    placeholder="--Select--"
                                    :selected="old('coupan_type', $editcoupan->coupan_type ?? '')"
                                    required />
                            </div>

                            <div class="col-md-4 mt-2 user-field">
                                <label for="user_id" class="form-label">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="" disabled selected>--Select User--</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $editcoupan->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mt-2 parking-field">
                                <label for="parking_id" class="form-label">Parking</label>
                                <select class="form-control" id="parking_id" name="parking_id">
                                    <option value="" disabled selected>--Select Parking--</option>
                                    @foreach ($parkings as $parking)
                                        <option value="{{ $parking->id }}"
                                            {{ old('parking_id', $editcoupan->parking_id ?? '') == $parking->id ? 'selected' : '' }}>
                                            {{ $parking->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mt-2">
                                <x-input-box name="validity" type="date" label="Validity"
                                    value="{{ old('validity', isset($editcoupan->validity) ? \Carbon\Carbon::parse($editcoupan->validity)->format('Y-m-d') : '') }}"
                                    required />
                            </div>
                        </div>

                        <button class="btn btn-primary mt-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleFields(type) {
                $('.user-field').hide();
                $('.parking-field').hide();

                if (type === 'userwise') {
                    $('.user-field').show();
                } else if (type === 'parking_wise') {
                    $('.parking-field').show();
                }
            }

            // Run once on page load (helpful if form is repopulated)
            toggleFields($('#coupan_type').val());

            // Run every time selection changes
            $('#coupan_type').on('change', function() {
                toggleFields($(this).val());
            });
        });
    </script>




@endsection
