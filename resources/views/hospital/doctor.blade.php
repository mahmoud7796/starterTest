@extends('layouts.app')

@section('content')

    <div class="alert alert-success" id="msg-succ" style="display: none">تم الحفظ بنجاح يامعلم</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.index_name')}}</th>
            <th scope="col">{{__('messages.create_price')}}</th>
            <th scope="col">{{__('messages.index_details')}}</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($doctors as $doctor)
            <tr>
                <td>{{$doctor->id}}</td>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->title}}</td>
                <td>
                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a href="{{route('doctors.services',$doctor->id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">عرض التخصصات</a>
                    </div>


                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a offer_id = "" class="delete btn btn-danger" href=""> Delete</a>
                    </div>

                </td>

            </tr>
        @endforeach



        </tbody>
    </table>
    @stop

