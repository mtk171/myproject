@extends('layouts.admin')
@include('layouts.header')

@section('content')
    <br>
    <br>



    {!! Form::open(['method' => 'POST','action'=>'UsersCategoryController@store']) !!}
    <div class="container ">
        @if(Session::has('category_name'))
            <p class="bg-danger">{{session('category_name')}}</p>
        @endif
        <div class="col-sm-5">
            <div class="form-group " >
                {!! Form::label('category_name','Category:') !!}
            {!! Form::text('category_name',null,['class'=>'form-control']) !!}


            </div>

            {!! Form::token() !!}
            <div class="form-group">
            {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}

            </div>
        </div>
    {!! Form::close() !!}
    </div>

@stop