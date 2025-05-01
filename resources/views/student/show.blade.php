@extends('student.base')
@section('title', 'Book Details')

@section('content')

<section class="py-5 min-vh-100">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-5">
                <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="img-fluid rounded shadow-sm" style="max-height: 450px; object-fit: cover; border: 3px solid black">
            </div>
            <div class="col-md-7">
                <h2 class="fw-bold mb-3">{{ $book->title }}</h2>
                <p class="text-muted mb-1"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="text-muted mb-1"><strong>Year:</strong> {{ $book->year }}</p>
                <p class="text-muted mb-1"><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p class="text-muted mb-1"><strong>Category:</strong> <span class="badge badge-custom py-1 px-2">{{ $book->category->name }}</span></p>
                <p class="text-muted mb-3"><strong>Available Stock:</strong> {{ $book->stock }}</p>

                <hr>

                <p class="mb-4 text-muted">No description available for this book.</p>

                @if($book->stock > 0)
                    @if($isAlreadyBorrowed)
                        <button class="btn btn-lg button fw-semibold" disabled>
                            <i class="bi bi-check-circle"></i> Borrowed
                        </button>
                    @else
                        <form action="{{ route('student.borrow', $book->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn button btn-lg fw-semibold">
                                <i class="bi bi-journal-arrow-down"></i> Borrow Book
                            </button>
                        </form>
                    @endif
                @else
                    <div class="alert alert-danger">This book is currently unavailable.</div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
