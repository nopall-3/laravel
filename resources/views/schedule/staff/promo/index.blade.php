@extends('templates.app')

@section('content')
    <div class="container my-3">
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('staff.promo.export') }}" class="btn btn-secondary mt-4">Export (.xslx)</a>
            <a href="{{ route('staff.promo.create') }}" class="btn btn-success mt-4">Tambah Data</a>
            <a href="{{ route('staff.promo.trash') }}" class="btn btn-primary mt-4">Data Sampah</a>
        </div>
        <h5 class="text-center mt-3">Data Promo</h5>
        <table class="table table-bordered" id="promosTables">
            <tr>
                <th>#</th>
                <th>Kode Promo</th>
                <th>Total Potongan</th>
                <th>aksi</th>
            </tr>
            {{-- @foreach ($promos as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->promo_code }}</td>
                    <td>
                        @if ($item->type == 'rupiah')
                        <p class="">Rp {{ number_format($item['discount'], 0, ',', '.') }}</p>

                        @else
                        <p>{{$item['discount']}}%</p>
                        @endif
                    </td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('staff.promo.edit', ['id' => $item['id']]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{route('staff.promo.delete',['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete </button>
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
            $('#promosTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('staff.promo.datatables') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'promo_code', name: 'promo_code' },
                    { data: 'type', name: 'type' },
                    { data: 'discount', name: 'discount' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            })
        })
        </script>
@endpush
