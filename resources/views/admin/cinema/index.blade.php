@extends('templates.app')

@section('content')
    <div class="container mt-5">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::get('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('admin.cinemas.export') }}" class="btn btn-secondary">Export (.xslx)</a>
            <a href="{{ route('admin.cinemas.create') }}" class="btn btn-success">Tambah Data</a>
            <a href="{{ route('admin.cinemas.trash') }}" class="btn btn-primary">Data Sampah</a>
        </div>

        <h5 class="mt-3">Bioskop</h5>

        <table id="cinemasTables" class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bioskop</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection

@push('script')
<script>
$(function () {
    $('#cinemasTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.cinemas.datatables') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'location', name: 'location' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
