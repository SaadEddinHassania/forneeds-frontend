{!! $dataTable->table(['width' => '100%']) !!}

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="\vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush