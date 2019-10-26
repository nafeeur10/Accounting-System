@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    @if($user->id)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    @endif

                    @if($user->companyLogo)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.companyLogo') }}
                        </th>
                        <td>
                            <img src="{{ asset($user->companyLogo) }}" alt="Logo" style="width: 180px; height: 180px">
                        </td>
                    </tr>
                    @endif

                    @if($user->name)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    @endif
                    @if($user->email)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    @endif
                    @if($user->phone)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    @endif
                    @if($user->address)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.address') }}
                        </th>
                        <td>
                            {{ $user->address }}
                        </td>
                    </tr>
                    @endif
                    @if($user->zipCode)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.zipCode') }}
                        </th>
                        <td>
                            {{ $user->zipCode }}
                        </td>
                    </tr>
                    @endif
                    @if($user->city)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>
                    @endif
                    @if($user->kvkNumber)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.kvkNumber') }}
                        </th>
                        <td>
                            {{ $user->kvkNumber }}
                        </td>
                    </tr>
                    @endif
                    @if($user->vatNumber)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vatNumber') }}
                        </th>
                        <td>
                            {{ $user->vatNumber }}
                        </td>
                    </tr>
                    @endif
                    @if($user->bankNumber)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.bankNumber') }}
                        </th>
                        <td>
                            {{ $user->bankNumber }}
                        </td>
                    </tr>
                    @endif
                    @if($user->invoiceFootnote)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.invoiceFootnote') }}
                        </th>
                        <td>
                            {{ $user->invoiceFootnote }}
                        </td>
                    </tr>
                    @endif
                    @if($user->passwordForAdmin)
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.password') }}
                        </th>
                        <td>
                            {{ $user->passwordForAdmin }}
                        </td>
                    </tr>
                    @endif
                    
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                                <span class="btn btn-info btn-xs label label-info label-many">{{ $role }}</span>
                            @endforeach
                        </td>
                    </tr>
                    
                    </tbody>
                </table>
                <a class="btn btn-lg btn-info" href="{{ route('client-user-edit', ['id' => $user->id] ) }}">
                    {{ trans('global.edit') }}
                </a>
            </div>


        </div>
    </div>
@endsection