@extends('templates.app')

@section('content')
    <div class="container mt-5">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('admin.cinemas.index') }}" class="btn btn-secondary">kembali</a>
        </div>
        <h5 class="mt-3">Bioskop</h5>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Nama Bioskop</th>
                <th>Lokasi Bioskop</th>
                <th>Aksi</th>
            </tr>
            @foreach ($cinemaTrash as $index => $item)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <th>{{ $item['name'] }}</th>
                    <th>{{ $item['location'] }}</th>
                    <th class="d-flex gap-2">
                        <form action="{{ route('admin.cinemas.restore', ['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Kembalikan</button>
                        </form>
                        <form action="{{ route('admin.cinemas.delete_permanent', ['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete Permanent</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
