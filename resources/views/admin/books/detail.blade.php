@extends('template.base')

@section('title', 'Book Details')

@section('content')

@if(session('message'))
<div class="alert alert-warning">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title m-3">Book Details</h3>
</div>

<div class="row">
    <div class="col-md-4 mb-5">
        <div class="card m-3">
            <img src="{{ asset($book->cover) }}" class="border border-black border-3" alt="{{ $book->title }}">
        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-3 fw-semibold">{{ $book->title }}</h4>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
            <p><strong>Year:</strong> {{ $book->year }}</p>
            <p><strong>Category:</strong> {{ $book->category->name }}</p>
            <p><strong>Stock:</strong>
                @if($book->stock > 0)
                    <span class="badge button-edit fw-semibold">Available ({{ $book->stock }})</span>
                @else
                    <span class="badge bg-danger">Out of Stock</span>
                @endif
            </p>

            <div class="mt-3">
                <a href="{{ route('book.edit', $book->id) }}" class="btn button-bekasi fw-semibold">Edit</a>
                <button class="btn button-delete fw-semibold" onclick="confirmDelete({{ $book->id }})">Delete</button>
                <a href="{{ route('book') }}" class="btn button-back fw-semibold">Back</a>

                <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(bookId) {
        Swal.fire({
            title: "Are you sure?",
            text: "This book data will be permanently deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + bookId).submit();
            }
        });
    }
</script>

@endsection
