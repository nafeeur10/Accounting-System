@extends('layouts.admin')
@section('content')

<div class="container card" id="invoice">
    <div class="row">
        <div class="col-md-6">
          
                <div id="editableCustomer">
                    <p> {{ $userMain->companyName }} </p>
                    <p>{{ $userMain->firstName }} {{ $userMain->lastName }}</p>
                    <p>{{ $userMain->street }}, {{ $userMain->postalCode }}</p>
                    <p>{{ $userMain->city }}, {{ $userMain->country }}.</p>
                </div>
            
        </div>
        <div class="col-md-6">
            
            <div id="clientInvoiceInfo">
                <p><b> {{ $client->name }} </b></p>
                <p> {{ $client->address }} {{ $client->zipCode }} {{ $client->city }} </p>
                <br>
                <p> {{ $client->email }} </p>
                <p> {{ $client->phone }} </p>
                <br>
                <p> {{ $client->kvkNumber }} </p>
                <p> {{ $client->vatNumber }} </p>
                <p> {{ $client->bankNumber }} </p>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 mt-3 mb-3 text-center" id="invoiceDiv">
            <h3 class="text-center">Invoice ID # {{ $invoiceProducts[0]->invoiceNumber }}</h3>
            <hr>
            
            <p>
            <b class="d-inline-block">Invoice Date # </b> 
                <span class="mr-3">{{ $invoiceProducts[0]->invoice_date }}</span>
            
              <b class="d-inline-block ml-3">Due Date # </b>
              <span>{{ $invoiceProducts[0]->invoice_due_date }}</span>
            </p>
            
        </div>
        
    </div>

    <div class="row">
      <div class="container">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>Serial</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>

        @php
          $cnt = 0;
          $total = 0;
        @endphp

        @foreach($invoiceProducts as $ip)
          <tr>
            <td>{{ ++$cnt }}</td>
            <td>{{ $ip->productName }}</td>
            <td>{{ $ip->productDescription }}</td>
            <td>{{ $ip->productUnitPrice }}</td>
            <td>{{ $ip->productQuantity }}</td>
            <td>{{ $ip->rowProductPrice }}</td>
            @php
            $total = $total + $ip->rowProductPrice;
            @endphp
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
          <hr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
          <b>Total: </b>
          <hr>
          </td>
          <td>
          {{ $total }}
          <hr>
          </td>
          </tr>
        </tfoot>
      </table>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <hr>
        <p class="text-right pr-3"><b>Total: </b>1000</p>
        <hr>
      </div>
    </div> -->
</div>
@endsection