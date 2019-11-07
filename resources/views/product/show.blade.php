@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.productName') }}
                        </th>
                        <td>
                            {{ $product->productName }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.productDescription') }}
                        </th>
                        <td>
                            {{ $product->productDescription }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.productUnitCost') }}
                        </th>
                        <td>
                            {{ $product->productUnitCost }}
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