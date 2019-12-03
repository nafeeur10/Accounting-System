@extends('layouts.admin')
@section('content')

<style>
#invoiceDiv p
{
  margin-bottom: 0!important;
}

.dt-buttons {
  display: none!important;
}
</style>

@include('partials.customer_modal')

<div class="container card">
  <div class="row mt-4 mb-4">
    <div class="col-md-6">
      <label for="invoiceNumber"><b>Invoice Number #</b></label>
      <input type="text" id="invoiceNumber" class="form-control" value="{{ $invoice }}">

      <br>

     <button class="btn btn-success my-3" id="selectCustomerBtn" type="button" data-toggle="modal" data-target="#customerModal">
       <i class="fas fa-user mr-2"></i>Select Customer</button>

      <div id="customerDetailsDiv">
        <p><b>Customer Details</b></p>
        <hr>
        <p id="customerDetails"></p>
      </div>

      
    </div>
    
  </div>
</div>

<div class="container card">
  <div class="row mt-4 mb-4">
    <div class="container">
    <form action="{{ route('saveInvoiceproducts')}}" method="POST" id="saveInvoiceProductForm">

      <div class="col-md-12 mb-5">
        <div class="row">
          <div class="col-md-6">
            <label for="invoiceNumber"><b>Invoice Date</b></label>
            <input type="date" class="form-control" name="invoiceDate" id="invoiceDate" value="{{ date('Y-m-d') }}">

          </div>
          <div class="col-md-6">
            <label for="invoiceNumber"><b>Due Date</b></label>
            @php
              $date = date("Y-m-d");
            @endphp
            <input type="date" class="form-control" name="invoiceDueDate" id="invoiceDueDate" value="{{ date('Y-m-d', strtotime($date. ' + 30 days')) }}">
          </div>
        </div>
      </div>
         
      <table class="table invoice-table">
        <thead class="thead-dark">
          <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>


        <tbody id="dynamic_row">
          <tr id="row1">

            <td>
              <select name="product_id[]" class="invoiceProducts">
                  <option>--Select a Option--</option>
                  @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->productName }}</option>
                  @endforeach
              </select>
            </td>

            <td>
              <input type="text" class="form-control itemDes" name="itemDescription[]" id="itemDescription">
            </td>

            <td><input type="text" class="form-control itemCost" name="itemCost[]" id="itemCost"></td>
            
            <td>
              <input type="number" class="form-control itemQuantity" name="itemQuantity[]">
              
            </td>

            <td>
              <i class="fas fa-plus-circle text-success mt-2" style="cursor:pointer" name="add" id="add"></i>
            </td>
            
          </tr>
          
        </tbody>
        
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>
              <input type="hidden" name="userID" value="" id="userIDOfCustomer"/>
              @csrf
              <button type="submit" name="createInvoiceButton" id="createInvoiceBtn" class="btn btn-success mb-3">
                
                  <i class="fas fa-external-link-alt"></i> Create Invoice
               
              </button>
              
            </td> 
            <td></td>
            <td></td> 
          </tr>
        </tfoot>

       
      </table>
      </form>
    </div>
  </div>

</div>




@endsection
@section('scripts')
@parent
<script>


$(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable()
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
var table = $('.datatable-User').DataTable();
table.columns.adjust().draw();

$("#InvoiceID").text($("#invoiceNumber").val());
$("#InvoiceDatePublish").text($("#invoiceDate").val());
$("#InvoiceDueDate").text($("#invoiceDueDate").val());

var conceptName = $("select[name='product_id']").find(":selected").text();

$(function(){
    onPageLoad();
});

function onPageLoad(){
  $('.invoiceProducts').select2({
    tags: true
  });
}

let i=1;  
var j = 0;

$("table.invoice-table").on('select-added', function(e) {
  $(this).find('.invoiceProducts').select2({
    tags: true
  });
});

$('#add').click(function(){  
   i++;
   j=i;

   //console.log("Inside: " + i);

   var html = '<tr id="row'+i+'" class="dynamic-added">';

   html += '<td><select name="product_id[]" class="invoiceProducts" id="itemSelect'+i+'"><option>--Select a option--</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->productName }}</option>@endforeach</select></td>';
   html += '<td><input type="text" class="form-control itemDes" name="itemDescription[]" id="itemDescription'+i+'"></td>';
   html += '<td><input type="text" class="form-control itemCost" name="itemCost[]" id="itemCost'+i+'"></td>';
   html += '<td><input type="number" class="form-control itemQuantity" name="itemQuantity[]" id="itemQuantity'+i+'"></td>';
   html += '<td><i class="fas fa-minus-circle btn_remove text-danger" name="remove" id="'+i+'" style="cursor: pointer;"></i></td></tr>';
   
   let tb = $("table.invoice-table").find("tbody");
   tb.append(html);
   tb.find('tr').last().trigger('select-added');
});  


$(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});  

console.log(j);


var length = $('#row1 option').length;
//console.log(length);

// AJAX Request
$('body').on('change', '.invoiceProducts', function() {
  
  var id = $(this).val();

  var idOfSelect = this.closest('tr').id;
 

  //var newProduct = $("#"+idOfSelect)

  //console.log("Select ID: " + idOfSelect);
  
  //console.log("I am here...");

  $.ajax({
      url: '/client/product/select/' + id,
      method: 'GET',
      success: function(data) {
        //console.log(data);
        $("#"+idOfSelect).find(".itemDes").val(data.productDescription);
        $("#"+idOfSelect).find(".itemCost").val(data.productUnitCost);
        $("#"+idOfSelect).find(".itemQuantity").val(1);
      },
      error: function(data) {
        console.log(data);

        // if(isNaN(id))
        // {
        //   alert("Oh yes! It's a String" + id);
        // }
        // else
        // {
        //   alert("Oh NO it is a number");
        // }  
          // if(idOfSelect==1)
          // {
          //   var lastValue = $('"#"+idOfSelect option:last-child').val();
          // }
          
         // alert("New Product " + length);
      }
  });
});



$("#customerDetailsDiv").hide();

$(".sentInvoiceModal").click(function(event) {

  event.preventDefault();
  $("#customerDetailsDiv").show();
  $("#customerDetails").empty();

  var id = $(this).attr('data-id');
  $("#userIDOfCustomer").val(id);
  console.log(id);

  $.ajax({
    url: '/client/invoice/customer/' + id,
    method: 'GET',
    success: function(data) {
      console.log(data);


      var html = '<p><b>'+ data.companyName + '</b></p>';
      html+= '<p>'+ data.firstName + ' ' + data.lastName + '</p>';
      html+='<p>'+ data.street + ', ' + data.postalCode + ', ' + data.city + ', ' + data.country + '</p>';

      $("#customerDetails").append(html);

      $('#customerModal').modal('hide');
    },
    error: function() {
      console.log(data);
    }
  });

})

</script>
@endsection