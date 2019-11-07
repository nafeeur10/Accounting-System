<!DOCTYPE HTML>
<html>
<head>
    <title>Invoice PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        p {
            margin-bottom: 0!important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <table class="table table-borderless">
            <thead class="thead-light text-center">
            <tr>
                <th>Receiver</th>
                <th>Sender</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                <td>
                    <p> {{ $userMain->companyName }} </p>
                    <p>{{ $userMain->firstName }} {{ $userMain->lastName }}</p>
                    <p>{{ $userMain->street }}, {{ $userMain->postalCode }}</p>
                    <p>{{ $userMain->city }}, {{ $userMain->country }}.</p>
                </td>
                <td>
                    <p><b> {{ $client->name }} </b></p>
                    <p> {{ $client->address }} {{ $client->zipCode }} {{ $client->city }} </p>
                    
                    <p> {{ $client->email }} </p>
                    <p> {{ $client->phone }} </p>
                    
                    <p> {{ $client->kvkNumber }} </p>
                    <p> {{ $client->vatNumber }} </p>
                    <p> {{ $client->bankNumber }} </p>
                </td>
            </tr>
            </tbody>
        </table>


        <table class="table table-borderless">
            <thead class="thead-light text-center">
            <tr>
                <h3 class="text-center p-2 mb-3" style="background-color: #E9ECEF">Invoice ID # {{ $invoiceProducts[0]->invoiceNumber }}</h3>
            </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                <td>
                    <p><b>Invoice Date # </b>{{ $invoiceProducts[0]->invoice_date }}</p>
                </td>
                <td>
                    <p><b>Due Date # </b> {{ $invoiceProducts[0]->invoice_due_date }}</p>
                </td>
                </tr>
            </tbody>
        </table>



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
</body>
</html>