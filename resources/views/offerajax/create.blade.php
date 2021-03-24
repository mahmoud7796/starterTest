@extends('layouts.app')

@section('content')
    <div class="container">
<div class="alert alert-success" id="msg-succ" style="display: none">تم الحفظ بنجاح يامعلم</div>

    <form method="POST" id="offerForm" class="needs-validation" novalidate action=""
          enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">أختر صورة العرض</label>
            <input type="file" class="form-control" name="photo">
            <small id="photo_error" class="form-text text-danger"></small>
        </div>

        <div class="form-group">
            <label for="Name">{{__('messages.create_name')}}</label>
            <input type="text" class="form-control" id="name" name="name_ar"  placeholder="Enter name">
            <small id="name_ar_error" class="form-text text-danger"></small>


        </div>

        <div class="form-group">
            <label for="Name">{{__('messages.create_name_en')}}</label>
            <input type="text" class="form-control" id="name" name="name_en"  placeholder="Enter name">
            <small id="name_en_error" class="form-text text-danger"></small>


        </div>
        <div class="form-group">
            <label for="price">{{__('messages.create_price')}}</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price here">
            <small id="price_error" class="form-text text-danger"></small>

        </div>
        <div class="form-group">
            <label for="details">{{__('messages.create_details')}}</label>
            <input type="text" class="form-control" id="details" name="details_ar" placeholder="details here">
            <small id="details_ar_error" class="form-text text-danger"></small>

        </div>

        <div class="form-group">
            <label for="details">{{__('messages.create_details_en')}}</label>
            <input type="text" class="form-control" id="details" name="details_en" placeholder="details here">

            <small id="details_en_error" class="form-text text-danger"></small>

        </div>

        <button type="button" id="save_offer" class="btn btn-primary">create</button>


    </form>
    </div>
@stop

@section('script')
<script>


    $(document).on('click', '#save_offer', function(e){
e.preventDefault();

/*        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        $('#photo_error').text('');
        $('#name_ar_error').text('');
        $('#name_en_error').text('');
        $('#price_error').text('');
        $('#details_ar_error').text('');
        $('#details_en_error').text('');


        var formData = new FormData($('#offerForm')[0]);
       // var formData = new FormData($('#offerForm')[0]);

        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('ajax.offer.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,

        success: function (data){
                if(data.status == true){
                    $('#msg-succ').show();
                }


        }, error: function (reject){
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val){
                    $("#" + key + "_error").text(val[0]);
                });

        }
    });

    });

</script>
@stop
