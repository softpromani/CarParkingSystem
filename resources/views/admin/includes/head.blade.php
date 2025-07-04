<meta charset="utf-8" />
<title>Admin | @yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon"
    href="{{ getBusinessSetting('website_favicon') &&
    Storage::disk('public')->exists(getBusinessSetting('website_favicon'))
        ? asset('storage/' . getBusinessSetting('website_favicon'))
        : asset('admin/assets/images/logo-sm.png') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- App css -->
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

@section('style')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endsection
