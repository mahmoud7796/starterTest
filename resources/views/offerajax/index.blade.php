@extends('layouts.app')

@section('content')

    <div class="alert alert-success" id="msg-succ" style="display: none">تم الحفظ بنجاح يامعلم</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.index_name')}}</th>
            <th scope="col">{{__('messages.create_price')}}</th>
            <th scope="col">{{__('messages.index_details')}}</th>
            <th scope="col">Photo</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($offers as $offer)
            <tr class="rowOffer{{$offer->id}}">
                <td>{{$offer -> name}}</td>
                <td>{{$offer -> price}}</td>
                <td>{{$offer -> details}}</td>
                <td><img src="{{$offer -> photo}}" style="width: 100px;height: 100px;"></td>
                <td>
                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a href="{{route('ajax.offer.edit',$offer -> id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                    </div>


                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a offer_id = "{{$offer -> id}}" class="delete btn btn-danger" href=""> Delete</a>
                    </div>

                </td>

            </tr>
        @endforeach



        </tbody>
    </table>
    @stop
@section('script')
    <script>

        $(document).on('click', '.delete', function(e){
            e.preventDefault();

                 $.ajaxSetup({
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                  var offer_id = $(this).attr('offer_id');

          //  var formData = new FormData($('#offerForm')[0]);
            // var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: 'post',
                url: "{{route('ajax.offer.delete')}}",
                data: {
                    'id': offer_id,
                },

                success: function (data){
                    if(data.status == true){
                        $('#msg-succ').show();
                    }
                    $('.rowOffer'+data.id).remove();


                }, error: function (reject){

                }
            });

        });
    </script>


    @stop
