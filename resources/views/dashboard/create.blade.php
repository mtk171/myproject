@extends('layouts.admin')



@section('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
	
@stop

@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
<style>
.back a:hover{
	text-decoration: none;
}
</style>

@stop

@section('content')
<div class="container">
<h3>{{$category->category_name}}</h3>

{!! Form::open(['method' => 'POST','action'=>'UsersDashController@store','class'=>'dropzone ']) !!}
    

   
<input type="hidden" name="category_id" value="{{$category->id}}" />

      
            
{!! Form::close() !!}



<br />

<a href={{url('/dash')}} type="button" class="btn btn-primary">Back</a>

</div>

@stop
