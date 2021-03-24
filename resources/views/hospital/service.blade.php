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
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($services as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service-> name}}</td>
                <td>
                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a href="{{route('hospital.doctors',$service-> id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">عرض الدكاترة</a>
                    </div>


                    <div class="btn-group" role="group"
                         aria-label="Basic example">
                        <a offer_id = "" class="delete btn btn-danger" href="{{route('hospital.delete',$service-> id)}}"> Delete</a>
                    </div>

                </td>

            </tr>
        @endforeach

        </tbody>
    </table><br><br>

    <form method="POST"  class="needs-validation" novalidate action="{{route('doctors.storedb')}}"
          enctype="multipart/form-data">
        @csrf

<div class="container">
        <div class="form-group">
            <label for="Name">أختر الطبيب</label>
            <select  class="form-control" name="doctor_idd">
                @foreach($alldoctors as $alldoctor )
                <option value="{{$alldoctor['id']}}">
                    {{$alldoctor['name']}}
                </option>
                    @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="Name">أختر الخدمة</label>
            <select  class="form-control" name="services_id[]" multiple>
                @foreach($allservices as $allservice )
                    <option value="{{$allservice -> id}}">
                        {{$allservice -> name}}

                    </option>
                @endforeach
            </select>

        </div>


        <button type="submit" class="btn btn-primary">Add</button>


    </form>
    </div>

@stop

