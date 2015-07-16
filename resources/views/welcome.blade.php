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
      <a class="navbar-brand" href="{{ url('/') }}">HoYin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
					<li @yield('homeActive')><a href="{{ url('/') }}">Home</a></li>
					<li @yield('collectionActive')><a href="{{url('/collection')}}">Collection</a></li>
					<li @yield('friendActive')><a href="{{url('/friend')}}">Friends</a></li>
      </ul>
    </div>
  </div>
</nav>



@yield('content')

	<!-- Scripts -->
	
		@yield('scriptfoot')

</body>
</html>
