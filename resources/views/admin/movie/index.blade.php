@extends('templates.app')
@section('content')
    <div class="container my-5">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::get('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.movie.export') }}" class="btn btn-secondary me-2">Export(.xlsx)</a>
            <a href="{{ route('admin.movie.create') }}" class="btn btn-success">Tambah Data</a>
            <a href="{{ route('admin.movie.trash') }}" class="btn btn-primary">Sampah Data</a>
        </div>
        <h5 class="mb-5">Data Film</h5>
        <table class="table table-bordered" id="moviesTable">
            <tr>
                <th>#</th>
                <th>Poster</th>
                <th>Judul Film</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
            </tr>
            {{-- @foreach ($movies as $key => $item)
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
                        <button class="btn btn secondary me-2" onclick="showModal({{ $item }})">Detail</button>
                        <a href="{{ route('admin.movie.edit', ['id' => $item->id]) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('admin.movie.delete', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger me-2">Hapus</button>
                        </form>
                        @if ($item->actived == 1)
                            <form action="{{ route('admin.movie.nonaktif', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">
                                    Non-Aktifkan
                                </button>
                            </form>
                        @endif
                    </th>
                </tr>
            @endforeach --}}
        </table>

        <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Film</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalDetailBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $('#moviesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.movie.datatables') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'poster_img',
                        name: 'poster_img',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'actived_badge',
                        name: 'actived_badge',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        function showModal(item) {
            // console.log(item);
            let image = "{{ asset('storage/') }}" + "/" + item.poster;
            let content = `
            <img src="${image}" width="120" class="d-block mx-auto my-3">
            <ul>
                <li>judul: ${item.title}</li>
                <li>Durasi: ${item.duration}</li>
                <li>Genre: ${item.genre}</li>
                <li>Sutradara: ${item.director}</li>
                <li>Usia Minimal: <span class="badge badge-danger">${item.age_rating}</span></li>
                <li>Sinopsis: ${item.description}</li>
            </ul>
            `;

            let modalDetailBody = document.querySelector("#modalDetailBody");
            modalDetailBody.innerHTML = content;
            let modalDetail = document.querySelector("#modalDetail");
            new bootstrap.Modal(modalDetail).show();
        }
    </script>
@endpush
