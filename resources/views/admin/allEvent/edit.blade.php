@extends('adminWelcome')

@section('title')
Edit All Day Event 
@endsection

@section('eventActive')
class="active"
@endsection

@section('showAllEventActive')
class="active"
@endsection

@section('scripthead')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('scriptfoot')
  <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $('.form_datetimeStart').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
    $('.form_datetimeEnd').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	
	
</script>

@endsection


@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Page</div>

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

          <form action="{{ URL('admin/allEvent/'.$allDayEvent->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
           Event Name:<input type="text" name="allEventName" class="form-control" value="{{ $allDayEvent->allEventName }}" required="required">
            <br>
            Time Start:
            <div class="input-group date form_datetimeStart col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" name="allDayEventTime" size="16" type="text" value="{{ $allDayEvent->allDayEventTime }}" readonly required="required">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <br>
            Time End:
            <div class="input-group date form_datetimeEnd col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" name="allDayEventTimeEnd" size="16" type="text" value="{{ $allDayEvent->allDayEventTimeEnd }}" readonly required="required">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>  
                </div> 
                <br>
            Image Link:<input type="text" name="allEventImgLink" class="form-control" value="{{ $allDayEvent->allEventImgLink }}" required="required">
            <br>
                        
            <button class="btn btn-lg btn-info">Edit Page</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>   
@endsection