@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contact.add') }}
    </div>

    <div class="card-body">
        <form action="{{ route('incoming.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="incomingFile" name="incomingFile">
                <label class="custom-file-label" for="incomingFile">Choose file</label>
            </div>
          


            <div>
                <input class="btn btn-success btn-lg mt-3" type="submit" value="{{ trans('global.upload') }}">
            </div>
        </form>


    </div>

    
</div>


@endsection

@section('scripts')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
@endsection