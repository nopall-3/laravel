@extends('templates.app')

@section('content')
    <div class="container mt-5">
        <h5>grafik pembelian tiket</h5>
        @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}
            <b>selamat datang, {{Auth::user()->name}}</b>
        </div>

        @endif
    </div>

@endsection
