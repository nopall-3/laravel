@extends('templates.app')
@section('content')
    <div class="w-75 d-block mx-auto my-5 p-4">
        <h5 class="text-center my-3">Mengubah Data Petugas</h5>
        <form method="POST" action="{{route('admin.staff.update', $users['id'])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$users['name']}}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$users['email']}}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Tambah Data</button>
        </form>
    </div>
@endsection
