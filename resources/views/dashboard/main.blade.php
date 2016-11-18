@extends('layouts.admin')

<br>

@section('content')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/users') }}">Dummy</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <li><a href="{{ url('/users') }}">Home</a></li>

                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    hello {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('ctg_index')}}"> Add Category</a></li>
                            <li><a href="{{url('/dash')}}">Home</a></li>
                            @if($categories)
                                    
                            <li class="dropdown">
                                <a href="{{route('dash_create')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   Add Books <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($categories as $category)
                                    <li><a href="{{ url('/dash/books/'.$category->id) }}">{{$category->category_name }}</a></li>
                                    
                                    @endforeach
                                </ul>
                                
                                @endif
                            </li>
                         @endif

                    </ul>
                </div>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div id="custom-search-input">
            <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" placeholder="Enter the Book" />
                <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
            </div>
        </div>
        <br>
        <br>
<div class="row">

<div id="left ">



@if($categories) 
  <div class="panel-group col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Category</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <ul class="list-group">
             @foreach($categories as $category)
          <a href="{{ url('/dash/books/display/'.$category->id) }}"><li class="list-group-item">{{$category->category_name }}</li></a>
            @endforeach
        </ul>
        
      </div>
    </div>
  </div>
@endif
   
</div>

<div class="right  col-sm-9">


    @if($photos)
               
        
    @foreach($photos as $photo)
         @if(pathinfo($photo->path, PATHINFO_EXTENSION)=='docx')
            <div class="col-lg-3 col-md-4 col-xs-6 thumb"> 
                <a class="thumbnail" href="{{url('/').$photo->file}}">

                    <img class="img-responsive" height=300 width=200 src="{{url('/files/docs.jpg')}}" alt="no image">
                    <div class = "caption">
                <h3>{{$photo->path }}</h3>
                </div>
                </a>
            </div>
        @elseif(pathinfo($photo->path, PATHINFO_EXTENSION)=='pdf')
            <div class="col-lg-3 col-md-4 col-xs-6 thumb"> 
                <a class="thumbnail" href="{{url('/').$photo->file}}">

                    <img class="img-responsive" height=300 width=200 src="{{url('/files/pdf.jpg')}}" alt="no image">
                    <div class = "caption">
                <h3>{{$photo->path }}</h3>
                </div>
                </a>
            </div>
        @endif
       
    @endforeach
    @endif

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                </a>
        </div>
</div>

</div>

@stop