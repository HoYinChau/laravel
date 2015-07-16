@extends('adminWelcome')

@section('title')
Show All Event
@endsection

@section('eventActive')
class="active"
@endsection

@section('showAllEventActive')
class="active"
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Index Of Admin</div>

        <div class="panel-body">

@foreach ($events as $event)
            <hr>
            <div class="page">
              <h4></h4>
              <div class="content">
                <p>
				ID:{{ $event->id }}
				<br>
                </p>
              </div>
            </div>
            <a href="{{ URL('admin/event/'.$event->id.'/edit') }}" class="btn btn-success">Edit</a>
			<form action="{{ URL('admin/event/'.$event->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
			@endforeach
<?php echo $events->render(); ?>      
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection