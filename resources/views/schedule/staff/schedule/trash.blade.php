    @extends('templates.app')
    @section('content')
        <div class="container my-5">
            <div class="d-flex justify-content-end">
                <a href="{{route('staff.schedule.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
            @if (Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <h3 class="my-3 text-center">Data sampah jadwal tayang</h3>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Nama Bioskop</th>
                    <th>Judul Film</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($scheduleTrash as $key => $schedule)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$schedule['cinema']['name']?? '-'}}</td>
                    <td>{{$schedule['movie']['title']?? '-'}}</td>
                    <td class="d-flex gap-2">
                        <form action="{{route('staff.schedule.restore', $schedule->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success ms-2">Kembalikan</button>
                        </form>
                        <form action="{{route('staff.schedule.delete_permanent', $schedule->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    @endsection
