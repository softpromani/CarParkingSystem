@extends('admin.includes.master')
@section('title', 'Social Media Link')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Social Media</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Business Settings</a></li>
                        <li class="breadcrumb-item active">Social Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                <form
                    action="{{ isset($editsocialmedia) ? route('admin.social-media.update', $editsocialmedia->id) : route('admin.social-media.store') }}"
                    method="post">
                    @csrf
                    @isset($editsocialmedia)
                        @method('PATCH')
                    @endisset
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <div>
                                    <label class="form-label" for="name">Name</label>
                                    <select class="form-control" name="name">
                                        <option value="" selected disabled>--Select--</option>
                                        <option value="instagram"
                                            {{ isset($editsocialmedia->name) ? ($editsocialmedia->name == 'instagram' ? 'selected' : '') : '' }}>
                                            Instagram</option>
                                        <option value="facebook"
                                            {{ isset($editsocialmedia->name) ? ($editsocialmedia->name == 'facebook' ? 'selected' : '') : '' }}>
                                            Facebook</option>
                                        <option value="twitter"
                                            {{ isset($editsocialmedia->name) ? ($editsocialmedia->name == 'twitter' ? 'selected' : '') : '' }}>
                                            Twitter</option>
                                        <option value="linkedin"
                                            {{ isset($editsocialmedia->name) ? ($editsocialmedia->name == 'linkedin' ? 'selected' : '') : '' }}>
                                            Linkedin</option>
                                    </select>
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <div>
                                    <x-input-box name="link" id="link" label="Social Media Link"
                                        value="{{ old('link', $editsocialmedia->link ?? '') }}" required />
                                </div>
                                @error('link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-1">
                                <button class="btn btn-primary">Submit</button>
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
                    <div class="row align-items-center">
                        <!-- Optional header content -->
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="users-table" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socialMedia as $media)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $media->name }}</td>
                                        <td><a href="{{ $media->link }}" target="_blank">{{ $media->link }}</a></td>

                                        <td>
                                            <div class="dropstart">
                                                <button class="btn btn-sm bg-white" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.social-media.edit', $media->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                            onclick="event.preventDefault(); confirmDelete({{ $media->id }})">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $media->id }}"
                                                            action="{{ route('admin.social-media.destroy', $media->id) }}"
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
            if (confirm('Are you sure you want to delete this social-media?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
