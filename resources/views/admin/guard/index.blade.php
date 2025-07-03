@extends('admin.includes.master')
@section('title', 'Guard List')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Guards
                    list
                </h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Guards</a></li>
                        <li class="breadcrumb-item active">Guards List</li>
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

                            <div class="d-flex justify-content-end "> <button
                                        onclick="window.location.href='{{ route('admin.guard.create') }}'"
                                        class="btn btn-primary">
                                        + Add Guard
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <x-data-table id="guard-table" :columns="$columns" ajax-url="{{ route('admin.guard.index') }}" />
                    </div>


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






@endsection
