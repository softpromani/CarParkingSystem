<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <table id="{{ $id }}" class="table table-bordered table-striped">
        <thead>
            <tr>
                @foreach ($columns as $col)
                    <th>{{ $col['label'] ?? ucfirst($col['data']) }}</th>
                @endforeach
            </tr>
        </thead>
    </table>

    @push('scripts')
    <script>
    $(document).ready(function () {
        $('#{{ $id }}').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ $ajaxUrl }}',
            columns: {!! json_encode($columns) !!}
        });
    });
    </script>
    @endpush

</div>
