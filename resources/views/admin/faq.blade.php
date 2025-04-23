@extends('admin.includes.master')
@section('title', 'Faqs')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Faq's</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Faq</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                <form method="POST"
                    action="{{ isset($editfaq) ? route('admin.faq.update', $editfaq->id) : route('admin.faq.store') }}">
                    @csrf
                    @if (isset($editfaq))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <x-input-box name="title" id="title" label="Title"
                                    value="{{ old('title', $editfaq->title ?? '') }}" required />
                            </div>

                            <div class="col-md-4">
                                <x-input-box name="description" id="description" label="Description"
                                    value="{{ old('description', $editfaq->description ?? '') }}" />
                            </div>

                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($editfaq) ? 'Update' : 'Submit' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Parking List</h5>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $faq->title }}</td>
                                        <td>{{ $faq->description }} </td>
                                        <td>
                                            <div class="dropstart">
                                                <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.faq.edit', $faq->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                            onclick="event.preventDefault(); confirmDelete({{ $faq->id }})">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $faq->id }}"
                                                            action="{{ route('admin.faq.destroy', $faq->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
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
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this brand?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

@endsection
