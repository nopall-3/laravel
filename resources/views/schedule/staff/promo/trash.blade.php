@extends('templates.app')

@section('content')
    <div class="container my-3">
        <div class="d-flex justify-content-end my-3">
            <a href="{{ route('staff.promo.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <h5 class="text-center mt-3">Data Promo</h5>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Kode Promo</th>
                <th>Total Potongan</th>
                <th>aksi</th>
            </tr>
            @foreach ($promoTrash as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->promo_code }}</td>
                    <td>
                        @if ($item->type == 'rupiah')
                            <p class="">Rp {{ number_format($item['discount'], 0, ',', '.') }}</p>
                        @else
                            <p>{{ $item['discount'] }}%</p>
                        @endif
                    </td>
                    <td class="d-flex gap-3">
                        <form action="{{route('staff.promo.restore', $item->id )}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Kembalikan</button>
                        </form>
                        <form action="{{route('staff.promo.delete_permanent', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus Permanent</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
