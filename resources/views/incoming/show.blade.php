@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">

            @php

            $supported_image = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
            );

            $fileNameForExtension = $incoming->fileName;
            $extention = explode('.',$fileNameForExtension);

            $imageBool = false;

            @endphp

            @foreach($supported_image as $si)
                @if($si==$extention[1])
                    @php($imageBool = true)
                @endif
            @endforeach
            
            @if($imageBool)
                <img src="{{ asset('Incoming/'.$incoming->fileName) }}" alt="File">
            @else
                <embed src="{{ asset('Incoming/'.$incoming->fileName) }}" width="100%" height="500" alt="pdf">
            @endif

            <br>

            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection