<!-- Customer Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerModalLabel">Customer List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
            <div class="card-header">
                {{ trans('cruds.contact.title') }}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.contact.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contact.fields.firstName') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contact.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contact.fields.phone') }}
                                </th>
                                <th>
                                    &nbsp;Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <form action="route('getCustomer', ['id' => $user->id ])" method="POST">
                            @csrf
                                <tr data-entry-id="{{ $user->id }}">
                                    <td>
                                        
                                            
                                            <input type="hidden" value="{{ $user->id }}" class="idOfCustomer">
                                        
                                    </td>
                                    <td>
                                        {{ $user->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->firstName ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->phone ?? '' }}
                                    </td>
                                    
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $user->id }}" class="sentInvoiceModal btn btn-xs btn-primary" type="submit">
                                            {{ trans('global.sentInvoice') }}
                                        </a>
                                        

                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>