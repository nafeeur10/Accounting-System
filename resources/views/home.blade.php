@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
       
            @can('users_manage')
            <div class="col-md-6">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Total Customers</div>
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>
            @endcan

            @can('client_manage')
            <div class="col-md-6">
                <div class="card bg-light mb-3">
                    <div class="card-header">Total Invoices</div>
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $totalInvoice }}</h3>
                    </div>
                </div>
            </div>
            @endcan
        
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection