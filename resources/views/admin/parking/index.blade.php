@extends('admin.includes.master')
@section('title', 'Parking')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h3 class="page-title">Users List</h3>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Users List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Parking Entries</h5>
                    <button onclick="window.location.href='{{ route('admin.parking.create') }}'" class="btn btn-primary">
                        + Add Parking
                    </button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive mt-3">
                        <table id="myTable" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                           </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->

    <!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center align-items-center">
        <div id="qrContainer" class="m-auto" style="height: 200px;width:200px"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" id="printQrBtn">Print</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.parking.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name', searchable: true },
                    { data: 'image', name: 'image', searchable: true  },
                    { data: 'address', name: 'address', searchable: true  },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        // Delete function
        function deleteUser(id) {
    var newurl = "{{ route('admin.parking.destroy', ':id') }}".replace(':id', id);

    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: newurl,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#myTable').DataTable().ajax.reload(); // Table ID check: 'myTable' not 'mytable'
                } else {
                    alert('Failed to delete!');
                }
            },
            error: function(xhr) {
                alert("Something went wrong!");
            }
        });
    }
}

        </script>

<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script>
    $(document).ready(function () {
        let qrCode;

        $(document).on('click', '.qr-btn', function () {
            const url = $(this).data('url');

            // Clear previous QR code
            $('#qrContainer').empty();
            $('#qrUrlText').text('');

            // Generate QR
            qrCode = new QRCode(document.getElementById("qrContainer"), {
                text: url,
                width: 200,
                height: 200
            });

            $('#qrUrlText').text(url);

            // Show modal
            $('#qrModal').modal('show');
        });

        $('#printQrBtn').on('click', function () {
            const printContents = document.getElementById('qrContainer').innerHTML;
            const newWin = window.open('', '', 'width=300,height=400');

            newWin.document.write(`
                <html>
                    <head><title>Print QR Code</title></head>
                    <body style="text-align:center; padding-top: 50px;">
                        ${printContents}
                    </body>
                </html>
            `);
            newWin.document.close();
            newWin.focus();
                newWin.print();
        });
    });
</script>



@endsection
