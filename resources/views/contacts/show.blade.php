@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contact.add') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.companyName') }}
                        </th>
                        <td>
                            {{ $user->companyName }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.firstName') }}
                        </th>
                        <td>
                            {{ $user->firstName }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.lastName') }}
                        </th>
                        <td>
                            {{ $user->lastName }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.street') }}
                        </th>
                        <td>
                            {{ $user->street }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.postalCode') }}
                        </th>
                        <td>
                            {{ $user->postalCode }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.country') }}
                        </th>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>

                    
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.vatNumber') }}
                        </th>
                        <td>
                            {{ $user->vatNumber }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.bankNumber') }}
                        </th>
                        <td>
                            {{ $user->bankNumber }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>

                    
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>


                   
                    
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection