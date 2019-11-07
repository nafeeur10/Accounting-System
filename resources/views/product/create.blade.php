@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf

            <div class="form-group {{ $errors->has('productName') ? 'has-error' : '' }}">
                <label for="productName">{{ trans('cruds.product.fields.productName') }}*</label>
                <input type="text" id="productName" name="productName" class="form-control" value="{{ old('productName', isset($product) ? $product->productName : '') }}" required>
                @if($errors->has('productName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('productName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product.fields.productName_helper') }}
                </p>
            </div>

         

            <div class="form-group {{ $errors->has('productDescription') ? 'has-error' : '' }}">
                <label for="productDescription">{{ trans('cruds.product.fields.productDescription') }}*</label>
                <input type="text" id="productDescription" name="productDescription" class="form-control" value="{{ old('productDescription', isset($product) ? $product->productDescription : '') }}" required>
                @if($errors->has('productDescription'))
                    <em class="invalid-feedback">
                        {{ $errors->first('productDescription') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product.fields.productDescription_helper') }}
                </p>
            </div>

          

            <div class="form-group {{ $errors->has('productUnitCost') ? 'has-error' : '' }}">
                <label for="productUnitCost">{{ trans('cruds.product.fields.productUnitCost') }}</label>
                <input type="text" id="productUnitCost" name="productUnitCost" class="form-control" value="{{ old('productUnitCost', isset($product) ? $user->productUnitCost : '') }}">
                @if($errors->has('productUnitCost'))
                    <em class="invalid-feedback">
                        {{ $errors->first('productUnitCost') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product.fields.productUnitCost_helper') }}
                </p>
            </div>


            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.submit') }}">
            </div>
        </form>


    </div>
</div>


@endsection