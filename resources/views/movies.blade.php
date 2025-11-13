@extends('templates.app')
@section('content')
<div class="container my-5">
    <h5 class="mb-5">Seluruh Film Sedang Tayang</h5>
    <form class="row mb-3" method="GET" action="">
            @csrf
            <div class="col-10">
                <input type="text" name="search_movie" placeholder="cari judul film" class="form-control">
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit">cari</button>
            </div>
        </form>
        <div class="container d-flex gap-4 mb-4 justify-content-center">
            @foreach ($movies as $key => $item)
                <div class="card" style="width: 18rem">
                    <img src=" {{ asset('storage/' . $item['poster']) }} " class="card-img-top" alt="Fissure in Sandstone"
                        style="height: 350px; object-fit:cover" />
                    <div class="card-body bg-primary text-warning text-center"
                        style="padding: 0 !important; text-align-center">
                        <a href="{{ route('schedule.detail', $item['id']) }}" class="text-warning">
                            <p class="card-text " style="padding: 0 !important; text-align-center">BELI TIKET</p>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
