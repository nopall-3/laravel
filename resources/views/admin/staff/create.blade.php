@extends('templates.app')
@section('content')
    <div class="w-75 d-block mx-auto my-5 p-4">
        <h5 class="text-center">Buat Data Petugas</h5>
        <form action="{{ route('admin.staff.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">tambah data</button>
        </form>
    </div>
@endsection
