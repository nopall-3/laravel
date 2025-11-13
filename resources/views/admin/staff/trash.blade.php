    @extends('templates.app')

    @section('content')
        <div class="container my-3">
            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary mt-4">kembali</a>
            </div>
            <h5 class="text-center mt-3">Data Pengguna</h5>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($userTrash as $index => $item)
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
                            <form action="{{route('admin.staff.restore', $item->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success">kembalikan</button>
                            </form>
                            <form action="{{route('admin.staff.delete_permanent', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete Permanent</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
