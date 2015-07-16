@extends('adminWelcome')

@section('title')
Show All Item
@endsection

@section('friendActive')
class="active"
@endsection


@section('content')
<div class="container">  
  <div class="row">
		@foreach ($friend as $friends)
              <div class="content col-xs-4 col-md-2 col-lg-1" >
	<p class="text-primary"><center>ID : {{$friends->id}}</center></p>
		<form action="{{ URL('admin/friend/'.$friends->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
		
		</div>
		@endforeach
	

  </div>
</div>  
@endsection