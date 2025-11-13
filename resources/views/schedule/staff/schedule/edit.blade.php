    @extends('templates.app')
    @section('content')
        <div class="container my-5">
            <form method="POST" action="{{ route('staff.schedule.update', $schedule['id']) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="cinema_id" class="col-form-label">Bioskop</label>
                    <input type="text" name="cinema_id" id="cinema_id" value="{{ $schedule['cinema']['name'] }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="movie_id" class="form-label">Film</label>
                    <input type="text" name="movie_id" id="movie_id" value="{{ $schedule['movie']['title'] }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" value="{{ $schedule['price'] }}"
                        class="form-control @error('price') is-invalid
                                        @enderror">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @if ($errors->has('hours.*'))
                    <small class="text-danger">{{ $errors->first('hours.*') }}</small>
                @endif
                <div class="mb-3">
                    <label for="hours" class="form-label">Jam Tayang</label>
                    @foreach ($schedule['hours'] as $index => $hours)
                        <div class="d-flex align-items-center hour-item">
                            <input type="time" name="hours[]" id="hours" class="form-control my-2"
                                value="{{ $hours }}">
                            <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 1.5rem; cursor: pointer "
                                onclick="this.closest('.hour-item').remove()"></i>
                        </div>
                    @endforeach
                    @if ($errors->has('hours.*'))
                        <br>
                        <small class="text-danger">{{ $errors->first('hours.*') }}</small>
                    @endif
                    <div id="additionalInput"></div>
                    <span class="text-primary my-3" style="cursor: pointer" onclick="addInput()">+tambah data</span>
                    @if ($errors->has('hours.*'))

                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>

            </form>
        </div>
    @endsection
    @push('script')
    <script>
        function addInput(){
            let content =   `<div class="d-flex align-items-center hours-additional">
                            <input type="time" name="hours[]" id="hours" class="form-control my-2">
                            <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 1.5rem; cursor: pointer "
                                onclick="this.closest('.hours-additional').remove()"></i>
                            </div>`;
            document.querySelector("#additionalInput").innerHTML += content;

        }


    </script>

    @endpush
