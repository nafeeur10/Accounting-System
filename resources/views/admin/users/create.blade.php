@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group {{ $errors->has('companyLogo') ? 'has-error' : '' }}">

                <input class="col-sm-8 pl-0 form-control-file" id="companyLogo" type="file" name="companyLogo" placeholder="Choose Logo for Company" />
                <div id="image-holder"></div>

                @if($errors->has('companyLogo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('companyLogo') }}
                    </em>
                @endif
            </div>
            <br>


            {{-- Company Name--}}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            {{--Emil Address--}}

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

            {{-- Phone Number--}}

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}">
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.phone_helper') }}
                </p>
            </div>


            {{-- Address --}}
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($user) ? $user->address : '') }}">
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.address_helper') }}
                </p>
            </div>

            {{-- Zip Code --}}

            <div class="form-group {{ $errors->has('zipCode') ? 'has-error' : '' }}">
                <label for="zipCode">{{ trans('cruds.user.fields.zipCode') }}</label>
                <input type="text" id="zipCode" name="zipCode" class="form-control" value="{{ old('zipCode', isset($user) ? $user->zipCode : '') }}">
                @if($errors->has('zipCode'))
                    <em class="invalid-feedback">
                        {{ $errors->first('zipCode') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.zipCode_helper') }}
                </p>
            </div>


            {{-- City --}}

            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($user) ? $user->city : '') }}">
                @if($errors->has('city'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.city_helper') }}
                </p>
            </div>


            {{-- KVK Number --}}
            <div class="form-group {{ $errors->has('kvkNumber') ? 'has-error' : '' }}">
                <label for="kvkNumber">{{ trans('cruds.user.fields.kvkNumber') }}</label>
                <input type="text" id="kvkNumber" name="kvkNumber" class="form-control" value="{{ old('kvkNumber', isset($user) ? $user->kvkNumber : '') }}">
                @if($errors->has('kvkNumber'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kvkNumber') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.kvkNumber_helper') }}
                </p>
            </div>


            {{-- Vat Number --}}
            <div class="form-group {{ $errors->has('vatNumber') ? 'has-error' : '' }}">
                <label for="vatNumber">{{ trans('cruds.user.fields.vatNumber') }}</label>
                <input type="text" id="vatNumber" name="vatNumber" class="form-control" value="{{ old('vatNumber', isset($user) ? $user->vatNumber : '') }}">
                @if($errors->has('vatNumber'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vatNumber') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.vatNumber_helper') }}
                </p>
            </div>

            {{-- Bank Number --}}

            <div class="form-group {{ $errors->has('bankNumber') ? 'has-error' : '' }}">
                <label for="bankNumber">{{ trans('cruds.user.fields.bankNumber') }}</label>
                <input type="text" id="bankNumber" name="bankNumber" class="form-control" value="{{ old('bankNumber', isset($user) ? $user->bankNumber : '') }}">
                @if($errors->has('bankNumber'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bankNumber') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.bankNumber_helper') }}
                </p>
            </div>

            {{-- Invoice Footnote --}}

            <div class="form-group {{ $errors->has('invoiceFootnote') ? 'has-error' : '' }}">
                <label for="invoiceFootnote">{{ trans('cruds.user.fields.invoiceFootnote') }}</label>
                <input type="text" id="invoiceFootnote" name="invoiceFootnote" class="form-control" value="{{ old('invoiceFootnote', isset($user) ? $user->invoiceFootnote : '') }}">
                @if($errors->has('invoiceFootnote'))
                    <em class="invalid-feedback">
                        {{ $errors->first('invoiceFootnote') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.invoiceFootnote_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>


@endsection