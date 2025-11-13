@extends('templates.app')

@section('content')
    <div class="container my-3">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.staff.export') }}" class="btn btn-secondary mt-4">Export (.xslx)</a>
            <a href="{{ route('admin.staff.create') }}" class="btn btn-success mt-4">Tambah Data</a>
            <a href="{{ route('admin.staff.trash') }}" class="btn btn-primary mt-4">Data Sampah</a>
        </div>
        <h5 class="text-center mt-3">Data Pengguna</h5>
        <table class="table table-bordered" id="usersTable">
            <tr>
                <th>#</th>
                <th>name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            {{-- @foreach ($users as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td class="text-center">
                        @if ($item['role'] == 'admin')
                            <span class="badge badge-primary">Admin</span>
                        @elseif ($item['role'] == 'staff')
                            <span class="badge badge-success">staff</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.staff.edit', ['id' => $item['id']]) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.staff.delete', ['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        </table>
    </div>
@endsection
@push('script')
    <script>
        $(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.staff.datatables') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            })
        })
        </script>
@endpush
