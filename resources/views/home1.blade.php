@extends('layouts.MainLayout')

@section('title')
    Home 
@endsection

@section('content')


<body style="background-color:#D2D6DE;">
<nav class="navbar navbar-default navbar-static-top" style="background-color: #3C8DBC;color: #fff;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: #fff;">
                    <!--    {{ config('app.name', 'Laravel') }}-->
                        The World
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="color: #fff;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color: #fff;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
    <br><br>
    <div class="col-md-6 col-md-push-3">
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Serach Country</h3>
            </div>
            <div class="box-body">
              
            
              <!-- /input-group -->
             
   <form action="{{url('home')}}" method="POST">{{ csrf_field() }}
              <div class="input-group margin">
             
                <input id="tags" name="name" type="text" class="form-control input-lg">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat input-lg">Go!</button>
                    </span>
                
              </div>
              </form>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
      </div>
</div>

<div class="container-fluid"><br><br>
@foreach(json_decode($data) as $d)
@if($d->name == $name)
<!--fav card start-->
<div class="col-md-4">
  <div class="box box-primary">
    <div class="box-header">
    <h3 class="box-title">{{$d->name}}</h3>
      <button value="{{$d->name}}"  id="button_1" class="fa fa-2x fa-heart-o pull-right" style="background:transparent;border:none;color:#d33724"></button>
    </div>
  <div class="box-body">
    <div class="col-md-6">
      <img src="{{$d->flag}}" height="150px" width="200px">
    </div>
    <div class="col-md-6">
    <div class="mapouter"><div class="gmap_canvas"><iframe width="200" height="150" id="gmap_canvas" src="https://maps.google.com/maps?q={{$d->name}}&t=&z=3&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{overflow:hidden;height:150px;width:200px;}.gmap_canvas {background:none!important;height:150px;width:200px;}</style></div>
    </div>
    <div class="col-md-12"><br></div>
    <p>Captital: {{$d->capital}}</p>
    <p>Currencies:
    </p>
    @foreach($d->currencies as $cur)
    <p>Currency Rate: 1 {{$cur->code}} {{\App\Http\Controllers\HomeController::getCurrency($cur->code)}} INR</p>
    <p>Currency Code: {{$cur->code}}</p>
    <p>Currency Name: {{$cur->name}}</p>
    <p>Currency Symbol: {{$cur->symbol}}</p>
    <!--<?php 
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://free.currencyconverterapi.com/api/v5/convert?q={{$cur->code}}_INR&compact=ultra')->getBody();
    echo $res;
    //echo json_decode($res)->$str;

    ?>-->
    @endforeach
  </div>
  <!-- /.box-body -->
  </div>
</div>
<!--fav card end-->
      
      
@endif
@endforeach
</div>
<div class="container-fluid"><br><br>
<h2>My Favorites</h2>
@foreach($favdata as $d)
<!--fav card start-->
<div class="col-md-4">
  <div class="box box-primary">
    <div class="box-header">
    <h3 class="box-title">{{$d->name}}</h3>
      <button value="#{{$d->name}}"  id="{{$d->name}}" class="btn-jq fa fa-2x fa-heart pull-right" style="background:transparent;border:none;color:#d33724"></button>
    </div>
  <div class="box-body">
    <div class="col-md-6">
      <img src="{{$d->flag}}" height="150px" width="200px">
    </div>
    <div class="col-md-6">
    <div class="mapouter"><div class="gmap_canvas"><iframe width="200" height="150" id="gmap_canvas" src="https://maps.google.com/maps?q={{$d->name}}&t=&z=3&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{overflow:hidden;height:150px;width:200px;}.gmap_canvas {background:none!important;height:150px;width:200px;}</style></div>
    </div>
    <div class="col-md-12"><br></div>
    <p>Captital: {{$d->capital}}</p>
    <p>Currencies:
    </p>
    @foreach($d->currencies as $cur)
    <p>Currency Rate: 1 {{$cur->code}} {{\App\Http\Controllers\HomeController::getCurrency($cur->code)}} INR</p>
    <p>Currency Code: {{$cur->code}}</p>
    <p>Currency Name: {{$cur->name}}</p>
    <p>Currency Symbol: {{$cur->symbol}}</p>
    <!--<?php 
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://free.currencyconverterapi.com/api/v5/convert?q={{$cur->code}}_INR&compact=ultra')->getBody();
    echo $res;
    //echo json_decode($res)->$str;

    ?>-->
    @endforeach
  </div>
  <!-- /.box-body -->
  </div>
</div>
<!--fav card end-->
@endforeach
</div>


</body>
@section('page_specs')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
function sendAjaxRequest(element,urlToSend) {
    var clickedButton = element;
    $.ajax({
        type: "POST",
        url: urlToSend,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { name: clickedButton.val() },
        
        success:function(result){
          
        $("#button_1").removeClass("fa-heart-o")
        $("#button_1").addClass("fa-heart")

        window.location.href = "/home";

        },
        error:function(result)
        {
            console.log(result);
            alert('error');
        }
    });
}

$(document).ready(function(){
    $("#button_1").click(function(e){
        e.preventDefault();
        sendAjaxRequest($(this),'/setFav');
    });
});
        
function sendAjaxRequest1(element,urlToSend){
    var clickedButton = element;
    $.ajax({
        type: "POST",
		url: urlToSend,
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: { name: clickedButton.val().replace('#', '') },
		success:function(result){
			$(clickedButton.val()).removeClass("fa-heart")
			$(clickedButton.val()).addClass("fa-heart-o")
			window.location.href = "/home";
		},
		error:function(result){
		  console.log(result);
		  alert('error');
		}
    });
}

$("button.btn-jq").click(function(e){
	e.preventDefault();
	sendAjaxRequest1($(this),'/removeFav');
});

//get country names for auto complete 
    $.ajax({type: "GET",
		url: 'getCountries',
		success:function(result){
			console.log(result)
			countries= result;
			$( "#tags" ).autocomplete({
  			source: result

			});
		},
		error:function(result){
		  console.log(result);
		  alert('error');
		}
    });
</script>
@endsection

