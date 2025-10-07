@extends('layouts.app') {{-- or whatever your main layout is --}}

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-9 col-lg-10 p-4">
        <h3 class="fw-semibold text-info mb-3 mt-4">My Invoices</h3>
        <p class="text-muted">View and download your past payment records.</p>

        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <h6 class="mb-0">You have <strong>2 unpaid invoices</strong> and <strong>4 paid</strong> records.</h6>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Invoice #</th>
                <th>Service</th>
                <th>Date</th>
                <th>Caregiver</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>INV001</td>
                <td>Home Nursing</td>
                <td>2025-07-01</td>
                <td>Rita Thapa</td>
                <td>Rs. 1,500</td>
                <td><span class="badge bg-success">Paid</span></td>
                <td><a href="#" class="btn btn-sm btn-outline-secondary">Download</a></td>
              </tr>
              <tr>
                <td>INV002</td>
                <td>Physiotherapy</td>
                <td>2025-07-03</td>
                <td>Sunil Gurung</td>
                <td>Rs. 1,200</td>
                <td><span class="badge bg-warning text-dark">Unpaid</span></td>
                <td><a href="#" class="btn btn-sm btn-outline-info">Pay Now</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
