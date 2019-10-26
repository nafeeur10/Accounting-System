@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contact.add') }}
    </div>

    <div class="card-body">
        <form action="{{ route('saveContact') }}" method="POST">
            @csrf

            <div class="form-group {{ $errors->has('companyName') ? 'has-error' : '' }}">
                <label for="companyName">{{ trans('cruds.contact.fields.companyName') }}*</label>
                <input type="text" id="companyName" name="companyName" class="form-control" value="{{ old('companyName', isset($user) ? $user->companyName : '') }}" required>
                @if($errors->has('companyName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('companyName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.companyName_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                <label for="firstName">{{ trans('cruds.contact.fields.firstName') }}*</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="{{ old('firstName', isset($user) ? $user->firstName : '') }}" required>
                @if($errors->has('firstName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('firstName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.firstName_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                <label for="lastName">{{ trans('cruds.contact.fields.lastName') }}*</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ old('lastName', isset($user) ? $user->lastName : '') }}" required>
                @if($errors->has('lastName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('lastName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.lastName_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}">
                <label for="street">{{ trans('cruds.contact.fields.street') }}*</label>
                <input type="text" id="street" name="street" class="form-control" value="{{ old('street', isset($user) ? $user->street : '') }}" required>
                @if($errors->has('street'))
                    <em class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.street_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('postalCode') ? 'has-error' : '' }}">
                <label for="postalCode">{{ trans('cruds.contact.fields.postalCode') }}*</label>
                <input type="text" id="postalCode" name="postalCode" class="form-control" value="{{ old('postalCode', isset($user) ? $user->postalCode : '') }}" required>
                @if($errors->has('postalCode'))
                    <em class="invalid-feedback">
                        {{ $errors->first('postalCode') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.postalCode_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.contact.fields.city') }}*</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($user) ? $user->city : '') }}" required>
                @if($errors->has('city'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.city_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                <label for="country">{{ trans('cruds.contact.fields.country') }}*</label>
                <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($user) ? $user->country : '') }}" required>
                @if($errors->has('country'))
                    <em class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.country_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('vatNumber') ? 'has-error' : '' }}">
                <label for="vatNumber">{{ trans('cruds.contact.fields.vatNumber') }}*</label>
                <input type="text" id="vatNumber" name="vatNumber" class="form-control" value="{{ old('vatNumber', isset($user) ? $user->vatNumber : '') }}" required>
                @if($errors->has('vatNumber'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vatNumber') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.vatNumber_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('bankNumber') ? 'has-error' : '' }}">
                <label for="bankNumber">{{ trans('cruds.contact.fields.bankNumber') }}*</label>
                <input type="text" id="bankNumber" name="bankNumber" class="form-control" value="{{ old('bankNumber', isset($user) ? $user->bankNumber : '') }}" required>
                @if($errors->has('bankNumber'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bankNumber') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.bankNumber_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.contact.fields.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.email_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.contact.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.contact.fields.phone_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-success btn-lg" type="submit" value="{{ trans('global.submit') }}">
            </div>
        </form>


    </div>
</div>


@endsection