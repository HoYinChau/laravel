<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HoYin | @yield('title')</title>
 

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

 <link rel="stylesheet" href=
  "{{ asset('/css/bootstrap.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
@yield('script')
@yield('scripthead')
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">HoYin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li @yield('adminHomeActive')><a href="{{url('admin/')}}">Home</a></li>
        <li  @yield('eventActive') class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Event<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li @yield('showAllEventActive')><a href="{{url('/admin/event/showAll')}}">Show ALL</a></li>
            <li @yield('eventAddActive')><a href="{{ URL('admin/event/create') }}">Add</a></li> 
			                <li class="divider"></li>
                <li class="dropdown-header">All Day Event</li>
            <li  @yield('allEventActive')><a href="{{url('/admin/allEvent/showAll')}}">Show ALL</a></li>
            <li  @yield('allEventAddActive')><a href="{{ URL('admin/allEvent/create') }}">Add</a></li> 
          </ul>
        </li>        
		<li @yield('itemActive') class="dropdown"  >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Item<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li  @yield('showAllItemActive')><a href="{{url('/admin/item/showAll')}}">Show ALL</a></li>
            <li  @yield('itemAddActive')><a href="{{ URL('admin/item/create') }}">Add</a></li>            
          </ul>
        </li>
		<li @yield('friendActive')><a href="{{url('admin/friend/')}}">Friend</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ URL('#') }}"><span class="glyphicon glyphicon-user"></span>{{Auth::user()->name}}</a></li>
        <li><a href="{{ URL('admin/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>					
    </div>
  </div>
</nav>

@yield('content')

	<!-- Scripts -->
	<!-- Latest compiled and minified CSS -->
<!-- Optional theme -->
  @yield('scriptfoot')
</body>
</html>
