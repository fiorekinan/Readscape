@extends('student.base')


@section('title', 'Semua Buku Berdasarkan Kategori')


@section('content')
<section id="categories" class="py-5">
    <div class="container">
        <h2 class="text-start mb-5 fw-bold">Books by Category</h2>

        @foreach($categories as $category)
            @if($category->books->count())
                <div class="mb-5">
                    <h4 class="mb-4 fw-semibold">{{ $category->name }}</h4>

                    <div class="scrolling-wrapper d-flex gap-4 overflow-auto pb-2">
                        @foreach($category->books as $book)
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('student.book.show', $book->id) }}" class="text-decoration-none">
                                    <div class="card h-100 border-black">
                                        <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" style="height: 220px; object-fit: cover; border-bottom: 3px solid black;">
                                        <div class="card-body p-2">
                                            <h6 class="card-title fw-semibold text-dark mb-1" title="{{ $book->title }}" style="font-size: 0.95rem;">{{ $book->title }}</h6>
                                            <p class="card-text text-muted mb-1 fw-semibold" style="font-size: 0.8rem;">{{ $book->author }}</p>
                                            <span class="badge badge-custom">{{ $book->category->name }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>



@endsection
