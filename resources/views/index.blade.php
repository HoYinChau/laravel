@extends('welcome')

@section('title')
Home
@endsection

@section('homeActive')
class="active"
@endsection

@section('content')
    <div class="container">
      <h2>緊急地下城 <?php echo date('Y-m-d');?>:</h2>
      <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>E</th>
          </tr>
        </thead>
        <tbody>
		@foreach ($events as $event)
        <tr>
            <td>
			<img src="{{ asset('/images/'.$event->eventImgLink.'.png') }}" class="img-responsive ">
			{{$event->eventTimeA}}
			</td>
			<td>
			<img src="{{ asset('/images/'.$event->eventImgLink.'.png') }}" class="img-responsive ">
			{{$event->eventTimeB}}
			</td>
            <td>
			<img src="{{ asset('/images/'.$event->eventImgLink.'.png') }}" class="img-responsive ">
			{{$event->eventTimeC}}
			</td>
            <td>
			<img src="{{ asset('/images/'.$event->eventImgLink.'.png') }}" class="img-responsive ">
			{{$event->eventTimeD}}
			</td>
            <td>
			<img src="{{ asset('/images/'.$event->eventImgLink.'.png') }}" class="img-responsive ">
			{{$event->eventTimeE}}
			</td>

		</tr>
		
		@endforeach
        </tbody>
      </table>
      </div>
	<br>
	
	      <h2>活動地下城</h2>
      <div class="table-responsive">          
      <table class="table table-hover">
        <tbody>
		@foreach ($allDayEvent as $allDayEvents)
          <tr>
          <td><img src="{{ asset('/images/'.$allDayEvents->allEventImgLink.'.png') }}" class = "img-responsive" style="min-width:40px;min-height:40px" /></td>
            <td>{{$allDayEvents->allEventName}}</td>
			<td>{{$allDayEvents->allDayEventTime}} To {{$allDayEvents->allDayEventTimeEnd}}</td>
		
          </tr>
@endforeach
          </tr>
        </tbody>
      </table>
      </div>

	
	
	
    </div>
@endsection
