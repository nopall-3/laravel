@extends('templates.app')
@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}<b>selamat datang, {{ Auth::user()->name }}</b></div>
    @endif

    @if (Session::get('logout'))
        <div class="alert alert-warning">{{ Session::get('logout') }}</div>
    @endif
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton"
            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
            <i class="fa-solid fa-location-dot"> lokasi</i>
        </button>
        <ul class="dropdown-menu w-100  " aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">jakarta</a></li>
            <li><a class="dropdown-item" href="#">bogor</a></li>
            <li><a class="dropdown-item" href="#">depok</a></li>
        </ul>
    </div>

    <!-- Carousel wrapper -->
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img style="height: 600px"
                    src="https://www.vidio.com/blog/wp-content/uploads/sites/2/2022/01/Wiro-Sableng_Cover_Landscape.jpg"
                    class="object-fit-cover d-block w-100" alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img style="height: 600px"
                    src="https://tix-event-asset-production.s3.ap-southeast-1.amazonaws.com/pn_event_ticketing/junjiitohorrorhouseindo/93bcb44d-dcac-49f7-b7f4-de56f0125888.webp"
                    class="object-fit-cover d-block w-100" alt="Canyon at Nigh" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img style="height: 600px"
                    src="https://tix-event-asset-production.s3.ap-southeast-1.amazonaws.com/pn_event_ticketing/marcin-live-in-indonesia/1f4dd62a-fe9f-4b8c-b979-ecceb1065338.webp"
                    class="object-fit-cover d-block w-100" alt="Cliff Above a Stormy Sea" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex aliign-items-center">
                <i class="fa-solid fa-clapperboard"></i>
                <h5 class="ms-2 mb-5">Sedang Tayang</h5>
            </div>
            <div>
                <a href="{{route('home.movies.all')}}" class="mb-5 btn btn-warning rounded-pill">Semua</a>
            </div>
        </div>
    </div>
    <div class="container d-flex gap2 mb-4">
        <a href="{{route('home.movies.all')}}" class="btn btn-outline-primary rounded-pill">Semua Film</a>
        <button class="btn btn-outline-secondary rounded-pill">XII</button>
        <button class="btn btn-outline-secondary rounded-pill">cinepolis</button>
        <button class="btn btn-outline-secondary rounded-pill">Imax</button>
    </div>

    <div class="container d-flex gap-2 mb-4 justify-content-center">
        @foreach ($movies as $key => $item)
            <div class="card" style="width: 18rem">
                <img src=" {{asset('storage/'.$item['poster']) }} "
                    class="card-img-top" alt="Fissure in Sandstone" style="height: 350px; object-fit:cover" />
                <div class="card-body bg-primary text-warning text-center" style="padding: 0 !important; text-align-center">
                    <a href="{{ route('schedule.detail', $item['id']) }}" class="text-warning">
                        <p class="card-text " style="padding: 0 !important; text-align-center">BELI TIKET</p>
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2020 Copyright:
            <a class="text-body" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
@endsection
