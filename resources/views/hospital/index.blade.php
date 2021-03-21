@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
        </div>
    @endif

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

        @foreach($data as $dataa)
            <tr>
                <td>{{$dataa->id}}</td>
                <td>{{$dataa-> name}}</td>
                <td>{{$dataa->address}}</td>
                <td>
                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a href="{{route('hospital.doctors',$dataa->id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">عرض الدكاترة</a>
                    </div>


                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a offer_id = "" class="delete btn btn-danger" href="{{route('hospital.delete',$dataa->id)}}"> Delete</a>
                    </div>

                </td>

            </tr>
        @endforeach



        </tbody>
    </table>
    @stop

