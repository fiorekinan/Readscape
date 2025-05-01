@extends('student.base')


@section('title', 'Buku yang Dipinjam')


@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4 fw-bold">Buku yang Sedang Dipinjam</h2>


        @if($borrowings->isEmpty())
            <div class="alert alert-info">Kamu belum meminjam buku apapun.</div>
        @else
            <div class="list-group">
                @foreach($borrowings as $borrowing)
    @php
        $book = $borrowing->book;
        $borrowedAt = \Carbon\Carbon::parse($borrowing->borrowed_at);
        $returnDate = \Carbon\Carbon::parse($borrowing->return_at);
        $diffInHours = now()->diffInHours($returnDate, false);
        $diff = $diffInHours < 0 ? ceil($diffInHours / 24) : floor($diffInHours / 24);
    @endphp

    <a href="{{ route('student.book.show', $book->id) }}" class="list-group-item list-group-item-action shadow-sm rounded mb-3 p-3 text-dark text-decoration-none" style="border: 3px solid black">
        <div class="d-flex flex-column flex-md-row align-items-md-center gap-4">
            <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="rounded shadow-sm" style="width: 120px; height: 170px; object-fit: cover; border: 3px solid black">
           
            <div class="flex-grow-1">
                <h5 class="mb-1 fw-semibold">{{ $book->title }}</h5>
                <p class="mb-1 text-muted">
                    Dipinjam: <strong>{{ $borrowedAt->format('d M Y') }}</strong> |
                    Kembali sebelum: <strong>{{ $returnDate->format('d M Y') }}</strong>
                </p>

                @if($diff === 0)
                    <span class="badge bg-custom mb-2" style="background-color: #EFD401">Hari Terakhir - Kembalikan Buku!</span>
                @elseif($diff < 0)
                    <span class="badge bg-custom mb-2" style="background-color: #C03D2D">Terlambat {{ abs($diff) }} hari - Denda Berlaku</span>
                @else
                    <span class="badge badge-custom mb-2" style="background-color: #578856">Masih ada {{ $diff }} hari</span>
                @endif

                <p class="mb-0"><strong>Status:</strong> {{ ucfirst($borrowing->status) }}</p>
            </div>
        </div>
    </a>
@endforeach

            </div>
        @endif
    </div>
</section>
@endsection
