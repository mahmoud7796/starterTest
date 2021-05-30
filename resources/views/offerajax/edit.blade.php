@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success" id="msg-succ" style="display: none">تم الحفظ بنجاح </div>

        <form method="POST" id="offerForm" class="needs-validation" novalidate action=""
              enctype="multipart/form-data">
            @csrf

            <input name="id" value="{{$offers -> id}}" type="hidden">
            <input name="edit_id" value="{{$offers -> id}}" type="hidden">

            <div class="form-group">
                <div class="text-center">
                    <img style="height: 200px"
                        src="{{$offers -> photo}}"
                        class="rounded-circle" alt="صورة العرض  ">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">أختر صورة العرض</label>
                <input type="file" class="form-control" name="photo" value="{{$offers -> photo }}">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="Name">{{__('messages.create_name')}}</label>
                <input type="text" class="form-control" value="{{$offers -> name_ar}}" name="name_ar"  placeholder="Enter name">
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="Name">{{__('messages.create_name_en')}}</label>
                <input type="text" class="form-control" value="{{$offers -> name_en}}" name="name_en"  placeholder="Enter name">
                @error('name_en')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="price">{{__('messages.create_price')}}</label>
                <input type="text" class="form-control" value="{{$offers -> price}}" name="price" placeholder="price here">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="details">{{__('messages.create_details')}}</label>
                <input type="text" class="form-control" value="{{$offers -> details_ar}}" name="details_ar" placeholder="details here">
                @error('details_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="details">{{__('messages.create_details_en')}}</label>
                <input type="text" class="form-control" value="{{$offers -> details_en}}" name="details_en" placeholder="details here">
                @error('details_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="button" id="update_offer" class="btn btn-primary">Update</button>


        </form>
    </div>
@stop

@section('script')
    <script>


        $(document).on('click', '#update_offer', function(e){
            e.preventDefault();

            /*        $.ajaxSetup({
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        }
                    });*/

            var formData = new FormData($('#offerForm')[0]);
            // var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offer.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function (data){
                    if(data.status == true){
                        $('#msg-succ').show();
                    }


                }, error: function (reject){

                }
            });

        });

    </script>
@stop
