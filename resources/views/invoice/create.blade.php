@extends('layouts.admin')
@section('content')

<div class="container pl-0 pr-0 mb-3">
    <button class="btn btn-success">Sent</button>
    <button class="btn btn-info">Download</button>
</div>

<div class="container card" id="invoice">
    <div class="row">
        <div class="col-md-6">
            <a style="text-decoration: none" href="{{ route('contacts.edit', $user->id) }}">
                <i class="fas fa-edit" id="editCustomer"></i>
                <div id="editableCustomer">
                    <p> {{ $user->companyName }} </p>
                    <p>{{ $user->firstName }} {{ $user->lastName }}</p>
                    <p>{{ $user->street }}, {{ $user->postalCode }}</p>
                    <p>{{ $user->city }}, {{ $user->country }}.</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <p><b>Online with You</b></p>
            <div id="clientInvoiceInfo">
                <p> {{ $client->name }} </p>
                <p> {{ $client->address }} {{ $user->zipCode }} {{ $user->city }} </p>
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
</div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('client_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection