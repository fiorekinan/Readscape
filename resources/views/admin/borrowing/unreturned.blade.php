@extends('template.base')

@section('title', 'Book Borrowing')

@section('content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title m-3">Readscape Book Borrowing Records</h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title fw-semibold">List of Active Borrowings</h4>
                </div>

                <table class="table table-striped border border-black border-3">
                    <thead class="table-dark">
                        <tr class="border border-black border-bottom border-3">
                            <th class="fw-semibold">No</th>
                            <th class="fw-semibold">Student Name</th>
                            <th class="fw-semibold">Book Title</th>
                            <th class="fw-semibold">Borrowed Date</th>
                            <th class="fw-semibold">Return Due</th>
                            <th class="fw-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrowings as $borrowing)
                        <tr class="border border-black border-bottom border-3 align-middle">
                            <td class="fw-medium">{{ $loop->iteration }}</td>
                            <td class="fw-medium">{{ $borrowing->user->name }}</td>
                            <td class="fw-medium">{{ $borrowing->book->title }}</td>
                            <td class="fw-medium">{{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') }}</td>
                            <td class="fw-medium">{{ \Carbon\Carbon::parse($borrowing->return_at)->format('d M Y') }}</td>
                            <td>
                                <form id="return-form-{{ $borrowing->id }}" action="{{ route('borrowing.return', $borrowing->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="button-edit fw-semibold px-4 py-2" onclick="confirmReturn({{ $borrowing->id }})">
                                        Return
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="border border-black border-bottom border-3">
                            <td colspan="6" class="text-center">No borrowing records available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-4">
                    {{ $borrowings->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmReturn(id) {
        Swal.fire({
            title: 'Are you sure you want to return this book?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#578856',
            cancelButtonColor: '#C03D2D',
            confirmButtonText: 'Yes, return it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('return-form-' + id).submit();
            }
        });
    }
</script>

@endsection
