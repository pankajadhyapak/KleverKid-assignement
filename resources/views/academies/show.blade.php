@extends('layout')

@section('page_header')
    <div class="page-header">
        <div class="container">
            <h2>{{ $academy->academy_name }} <small> Detail's </small></h2>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>Academy Name</h4>
                    {{ $academy->academy_name }}
                </li>

                <li class="list-group-item">
                    <h4>Time Slot</h4>
                    {{ $academy->timeslots }}
                </li>
                <li class="list-group-item">
                    <h4>Email</h4>
                    {{ $academy->email }}
                </li>
                <li class="list-group-item">
                    <h4>Phone Number</h4>
                    {{ $academy->phone }}
                </li>
                <li class="list-group-item">
                    <h4>Description</h4>
                    {{ $academy->description }}
                </li>

            </ul>
        </div>
        <div class="col-md-6">

        </div>
    </div>



@stop
