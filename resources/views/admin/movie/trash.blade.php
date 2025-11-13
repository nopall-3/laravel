@extends('templates.app')
@section('content')
    <div class="container my-5">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.movie.index') }}" class="btn btn-success">kembali</a>
        </div>
        <h5 class="mb-5">Data Film</h5>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Poster</th>
                <th>Judul Film</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
            </tr>
            @foreach ($movieTrash as $key => $item)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <th>
                        <img src="{{ asset('storage/' . $item['poster']) }}" alt="" width="120">
                    </th>
                    <th>{{ $item['title'] }}</th>
                    <th>
                        @if ($item['actived'] == 1)
                            <span class="badge badge-success">aktif</span>
                        @else
                            <span class="badge badge-danger">tidak aktif</span>
                        @endif
                    </th>
                    <th class="d-flex">
                        <form action="{{ route('admin.movie.restore', $item->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-success me-2">kembaliakn</button>
                        </form>
                        <form action="{{ route('admin.movie.delete_permanent', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger me-2">Delete Permanent</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

