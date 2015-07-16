@extends('adminWelcome')

@section('title')
Show All Day Event
@endsection

@section('eventActive')
class="active"
@endsection

@section('allEventActive')
class="active"
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-12 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Index Of Admin</div>

        <div class="panel-body">

@foreach ($allDayEvent as $allDayEvents)
            <div class="page">
              <h4></h4>
              <div class="content">
                <p>
				ID:{{ $allDayEvents->id }}
				<br>
                </p>
              </div>
            </div>
            <a href="{{ URL('admin/allEvent/'.$allDayEvents->id.'/edit') }}" class="btn btn-success">Edit</a>
			<form action="{{ URL('admin/allEvent/'.$allDayEvents->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
			@endforeach
<?php echo $allDayEvent->render(); ?>      
			
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection