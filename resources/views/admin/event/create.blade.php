@extends('adminWelcome')

@section('title')
Add Event
@endsection

@section('eventActive')
class="active"
@endsection

@section('eventAddActive')
class="active"
@endsection


@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Add Event</div>

        <div class="panel-body">

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

          <form action="{{ URL('admin/event') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            A Time:<input type="text" name="eventTimeA" class="form-control" required="required">
            <br>
            B Time:<input type="text" name="eventTimeB" class="form-control" required="required">
            <br>
            C Time:<input type="text" name="eventTimeC" class="form-control" required="required">
            <br>
            D Time:<input type="text" name="eventTimeD" class="form-control" required="required">
            <br>
            E Time:<input type="text" name="eventTimeE" class="form-control" required="required">
            <br>
			Image Link:<input type="text" name="eventImgLink" class="form-control" required="required">
			<br>
            <button class="btn btn-lg btn-info">Add	Event</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection