@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title m-3">Data on Book Borrowings</h3>
</div>

<div class="row mb-5">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fw-semibold">List of Borrowed Books</h4>

                <table class="table table-striped border border-black border-3">
                    <thead class="table-dark">
                        <tr class="border border-black border-bottom border-3">
                            <th class="fw-semibold">No</th>
                            <th class="fw-semibold">Student Name</th>
                            <th class="fw-semibold">Book Title</th>
                            <th class="fw-semibold">Borrow Date</th>
                            <th class="fw-semibold">Return Date</th>
                            <th class="fw-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrowings as $borrowing)
                        <tr class="border border-black border-bottom border-3">
                            <td class="fw-medium">{{ $loop->iteration }}</td>
                            <td class="fw-medium">{{ $borrowing->user->name }}</td>
                            <td class="fw-medium">{{ $borrowing->book->title }}</td>
                            <td class="fw-medium">{{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') }}</td>
                            <td class="fw-medium">{{ \Carbon\Carbon::parse($borrowing->return_at)->format('d M Y') }}</td>
                            <td class="fw-medium">
                                @if($borrowing->status === 'dikembalikan')
                                <span class="button-edit px-3 py-1 fw-semibold">Returned</span>
                                @elseif($borrowing->status === 'dipinjam')
                                <span class="button-bekasi px-3 py-1 fw-semibold">Borrowed</span>
                                @else
                                <span class="button-delete px-3 py-1 fw-semibold">Unknown</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="border border-black border-bottom border-3">
                            <td colspan="6" class="text-center">No borrowings data available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $borrowings->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection