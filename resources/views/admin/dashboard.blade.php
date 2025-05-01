@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon text-white d-inline-flex align-items-center justify-content-center border border-black border-3">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <!-- Cards -->
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card card-custom-left border border-black border-3 card-img-holder text-white">
        <div class="card-body">
          <img src="{{ asset('purple/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Book Loans <i class="mdi mdi-book-open-page-variant mdi-24px float-end"></i></h4>
          <h2 class="mb-5">1,245 Books</h2>
          <h6 class="card-text">Borrowings this semester</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card card-custom-middle border border-black border-3 card-img-holder text-white">
        <div class="card-body">
          <img src="{{ asset('purple/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Active Users <i class="mdi mdi-account-multiple-outline mdi-24px float-end"></i></h4>
          <h2 class="mb-5">48 Users</h2>
          <h6 class="card-text">Decreased by 10%</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card card-custom-right border border-black border-3 card-img-holder text-white">
        <div class="card-body">
          <img src="{{ asset('purple/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3"> Top Genre <i class="mdi mdi-library-shelves mdi-24px float-end"></i></h4>
          <h4 class="mb-5">Self Improvement</h4>
          <h6 class="card-text">Most borrowed by RPL & DKV students</h6>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card border border-black border-3">
        <div class="card-body">
          <div class="clearfix">
            <h4 class="card-title float-start">Library Visitors Statistics</h4>
            <div id="visit-sale-chart-legend" class="legend-custom float-end"></div>
          </div>
          <canvas id="visit-sale-chart" class="mt-4"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-5 grid-margin stretch-card">
      <div class="card border border-black border-3">
        <div class="card-body">
          <h4 class="card-title">Borrowed Book Categories</h4>
          <div class="doughnutjs-wrapper d-flex justify-content-center">
            <canvas id="traffic-chart"></canvas>
          </div>
          <div id="traffic-chart-legend" class="legend-custom-vertical pt-4"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
