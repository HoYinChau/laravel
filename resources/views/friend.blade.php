@extends('welcome')

@section('title')
Friends
@endsection

@section('friendActive')
class="active"
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div style="float:left"><h3>Friends</h3>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
		   <form action="{{ URL('friendSearchByID') }}" method="GET">
            Search By Captain ID : <input type="text" name="search" id="search" placeholder="Captain ID" required="required"/>
			<button class="btn btn-info">search</button>
			<a onclick="window.location='{{URL('friend/')}}'" ><input class="btn btn-danger" type="reset" value="Reset"></a>

</form>
		</div>
		<div style="float:right"><a href="{{url('friend/create')}}" class="btn btn-info" role="button">Add</a></div>
		<div style="clear:both"></div>
		<br>
		   <div class="content">
            <div class="table-responsive">
             <table class="table table-hover">
			 <tr>
			 <th>ID</th>
			 <th>Captain</th>
			 <th>Captain 2</th>
			 <th>Need</th>
			 
			 </tr>
			@foreach ($friend as $friends)

             	<tr>
                	<td>{{$friends->pad_id}}</td>
                	<td><img src="{{ asset('/images/'.$friends->captainImgLink.'.png') }}" class = "img-responsive" width="40px" height="40px"/></td>
				
                	<td><img src="{{ asset('/images/'.$friends->captain_2_idImgLink.'.png') }}" class = "img-responsive" width="40px" height="40px"/></td>
                
                	<td><img src="{{ asset('/images/'.$friends->need_idImgLink.'.png') }}" class = "img-responsive" width="40px" height="40px"/></td>
				</tr>
				<tr>
					<td colspan="4"><center>{{$friends->text}}</center></td>
                </tr>
				
			@endforeach
		                </table>
              </div>
             </div>	
			
<?php echo $friend->render(); ?>      
    </div>
</div>  
@endsection