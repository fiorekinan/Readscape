@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title m-3">Data on Library Book Categories</h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title fw-semibold">List of Book Categories</h4>
                    <button class="btn button btn-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
                </div>

                <table class="table table-striped border border-black border-3">
                    <thead class="table-dark">
                        <tr class="border border-black border-bottom border-3">
                            <th class="fw-semibold">Category ID</th>
                            <th class="fw-semibold">Name</th>
                            <th class="fw-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="border border-black border-bottom border-3">
                            <td class="fw-medium">{{ $category->id }}</td>
                            <td class="fw-medium">{{ $category->name }}</td>
                            <td>
                                <button class="btn button-edit fw-semibold px-4 py-2" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{ $category->id }}">Edit</button>
                                
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn button-delete fw-semibold px-4 py-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="border border-black border-bottom border-3">
                            <td colspan="3" class="text-center">Tidak ada data kategori</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Category -->
@foreach($categories as $category)
<div class="modal fade" id="updateCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="updateCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog border border-black border-3">
        <div class="modal-content">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="updateCategoryModalLabel{{ $category->id }}">Update Category {{ $category->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input name="name" value="{{ old('name', $category->name) }}" type="text" class=" fw-semibold border border-black border-3 form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Kategori">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-delete fw-semibold py-2 px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn button-edit fw-semibold py-2 px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Add Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog border border-black border-3">
        <div class="modal-content">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="categoryModalLabel">Add Book Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name fw-semibold">Category</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Kategori">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-delete fw-semibold py-2 px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn button-edit fw-semibold py-2 px-4">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
    categoryModal.show();
  });
</script>
@endif

@endsection
