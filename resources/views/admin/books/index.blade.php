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
      <h3 class="page-tittle fw-bold m-3">Readscape Book Data</h3>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body position-relative">
          <h4 class="card-title fw-semibold">Book Data List</h4>
          </p>
          <table class="table table-bordered border border-black border-3">
            <thead class="table-dark border border-bottom border-black border-3">
              <tr>
                <th class="border border-end border-black border-3 fw-bold"> Book ID </th>
                <th class="border border-end border-black border-3 fw-bold"> Title </th>
                <th class="border border-end border-black border-3 fw-bold"> Status </th>
                <th class="border border-end border-black border-3 fw-bold"> Action </th>
              </tr>
            </thead>
            <tbody>
              @forelse($books as $book)
              <tr class="border border-black border-3">
                <td class="border border-end border-black border-3 fw-semibold"> {{ $book->id }} </td>
                <td class="border border-end border-black border-3 fw-semibold"> {{ $book->title}} </td>
                <td class="border border-end border-black border-3 fw-semibold">
                  @if($book->stock > 0)
                    <span class="badge badge-hijau">Available ({{ $book->stock }})</span>
                  @else
                    <span class="badge bg-danger">Not Available</span>
                  @endif
                </td>
                <td class="border border-end border-black border-3">
                  <a href="{{ route('book.detail', $book->id)}}" class="btn button-edit btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('book.edit', $book->id) }}" class="btn button-bekasi btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="#" class="btn button-delete btn-sm">
                    <i class="fa fa-trash-can"></i>
                  </a>
                </td>
              </tr>
              @empty
                  <tr class="border border-black border-3">
                    <td>No book data available.</td>
                  </tr>
              @endforelse
            </tbody>
          </table>

          {{-- pagination --}}
          <div class="d-flex justify-content-center mt-3">
            {{ $books->links('pagination::bootstrap-4')}}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection