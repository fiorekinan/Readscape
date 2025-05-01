@extends('template.base')

@section('title', 'Update Book Data')

@section('content')

@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title fw-bold m-3">Update Book Information</h3>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title fw-semibold">Fill this form to update the book details</h4>

        <form class="forms-sample fw-medium" action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="title">Book Title</label>
            <input value="{{ $book->title }}" name="title" type="text" class="border border-black border-3 form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter the Book Title">
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="category_id">Choose the Book Category</label>
            <select name="category_id" id="category_id" class="border border-black border-3 rounded-0 form-select">
              <option disabled selected>-- Choose a Category --</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="author">Writer</label>
            <input value="{{ $book->author }}" name="author" type="text" class="border border-black border-3 form-control @error('author') is-invalid @enderror" id="author" placeholder="Enter the Writer">
            @error('author')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="publisher">Publisher</label>
            <input value="{{ $book->publisher }}" name="publisher" type="text" class="border border-black border-3 form-control @error('publisher') is-invalid @enderror" id="publisher" placeholder="Enter the Publisher">
            @error('publisher')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="year">Year Published</label>
            <input value="{{ $book->year }}" name="year" type="number" class="border border-black border-3 form-control @error('year') is-invalid @enderror" id="year" placeholder="Enter the Year">
            @error('year')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="stock">Stock</label>
            <input value="{{ $book->stock }}" name="stock" type="number" class="border border-black border-3 form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter the Stock">
            @error('stock')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="cover">Upload the Cover</label>
            <input name="cover" type="file" class="border border-black border-3 form-control @error('cover') is-invalid @enderror" id="cover">
            @error('cover')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4 mb-3">
            <div class="card">
              <img class="border border-black border-3" src="{{ asset($book->cover) }}" alt="{{ $book->title }}">
            </div>
          </div>

          <button type="submit" class="btn button-edit fw-semibold py-2 px-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
