@extends('template.base')
<!-- ini buat ngepanggil -->

@section ('tittle', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-sucsess">
  {{session('message')}}
</div>
@endif

  <div class="page-header">
      <h3 class="page-tittle fw-bold m-3">Add a New Book</h3>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title fw-semibold">Fill this form to add a new book</h4>
            <form class="forms-sample fw-medium" action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="title">Book Title</label>
                <input name="title" class="border border-black border-3 form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter the Book Title">
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="category">Choose the Book Category</label>
                <select name="category_id" id="category_id" class="border border-black border-3 rounded-0 form-select">
                    <option selected disabled="">Choose the Book Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="author">Writer</label>
                <input name="author" type="text" class="border border-black border-3 form-control @error('author') is-invalid @enderror" id="author" placeholder="Enter the Writer">
                @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="publisher">Publisher</label>
                <input name="publisher" type="text" class="border border-black border-3 form-control @error('publisher') is-invalid @enderror" id="publisher" placeholder="Enter the Publisher">
                @error('publisher')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="year">Year Published</label>
                <input name="year" type="number" class="border border-black border-3 form-control @error('year') is-invalid @enderror" id="publisher" placeholder="Enter the year">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="stock">Stock</label>
                <input name="stock" type="number" class="border border-black border-3 form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter the Stock">
                @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="cover">Upload the Cover</label>
                <input name="cover" type="file" class="border border-black border-3 form-control @error('cover') is-invalid @enderror" id="cover" placeholder="Upload the cover image">
                @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="btn button-edit fw-semibold py-2 px-4">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>


@endsection