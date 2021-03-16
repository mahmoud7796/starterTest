@extends('layouts.app')

@section('content')
    <div class="container">

    <form method="POST" class="needs-validation" novalidate action=""
          enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">chose Photo</label>
            <input type="file" class="form-control" name="photo">
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="Name">{{__('messages.create_name')}}</label>
            <input type="text" class="form-control" id="name" name="name_ar"  placeholder="Enter name">
            @error('name_ar')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

        <div class="form-group">
            <label for="Name">{{__('messages.create_name_en')}}</label>
            <input type="text" class="form-control" id="name" name="name_en"  placeholder="Enter name">
            @error('name_en')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="form-group">
            <label for="price">{{__('messages.create_price')}}</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price here">
            @error('price')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="details">{{__('messages.create_details')}}</label>
            <input type="text" class="form-control" id="details" name="details_ar" placeholder="details here">
            @error('details_ar')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="details">{{__('messages.create_details_en')}}</label>
            <input type="text" class="form-control" id="details" name="details_en" placeholder="details here">
            @error('details_en')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button type="button" id="save_offer" class="btn btn-primary">create</button>


    </form>
    </div>
@stop

@section('script')
<script>


    $(document).on('click', '#save_offer', function(){

        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
       type: 'post',
        url: "{{Route('ajax.offer.store')}}",
        data:  {
        },
        success: function (data){

        }, error: function (reject){

        }
    });

    });

</script>
@stop