@extends('student.base')
@section('title', 'Welcome Student')

@section('content')

    {{-- hero --}}
    <section class="hero text-center">
        <div class="container-fluid">
            <div class="row min-vh-80 hero-section">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5">
                    <h1 class="text-start w-100 fw-bold">Welcome to Readscape – Your Gateway to Endless Stories and Knowledge!</h1>
                    <p class="text-start w-75">A digital library by SMK IDN Boarding School Akhwat — where knowledge meets curiosity.</p>
                    <a href="#books" class="button btn fw-semibold px-4 py-1">View Latest Books</a>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center position-relative">
                    <img width="600" src="{{ asset('purple/assets/hero-img.png')}}" alt="" class="mt-auto">
                </div>
            </div>
            
        </div>
    </section>

<!-- Buku Terbaru -->
<section id="books" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Latest Books</h2>
        <div class="row">
            @foreach($books->take(4) as $book)
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->author}}</p>
                        <span class="badge badge-custom">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('student.all.books') }}" class="btn button fw-semibold">See All Books</a>
        </div>
    </div>
</section>

<!-- Pencarian Buku -->
<section id="search" class="py-5">
    <div class="container">
        <h2 class="section-title text-center text-purple mb-4">Search Books</h2>
        <form action="#" method="GET" class="d-flex justify-content-center">
            <div class="input-group w-50">
                <input type="text" name="keyword" class="form-control rounded-start border-start border-3 border-black" placeholder="Search by title, writer...">
                <button type="submit" class="btn border border-3 border-black rounded-end px-4 text-black fw-semibold" style="background: #578856;">Search</button>
            </div>
        </form>
    </div>
</section>

<!-- Semua Buku -->
<section id="all-books" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">All Books</h2>
        <div class="row">
           @foreach($allBook as $book)
            <div class="col-md-2 mb-3">
                <div class="card h-100 custom-card">
                    <img src="{{ asset($book->cover) }}" alt="img">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $book->title }}</h6>
                        <span class="badge badge-custom">{{ $book->category->name }}</span>
                        <a href="{{ route('student.book.show', $book->id) }}" class="btn btn-sm mt-2 text-decoration-underline fw-semibold">See Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection