@extends('welcome')

@section('title')
Add Friends
@endsection

@section('friendActive')
class="active"
@endsection

@section('scripthead')
<script>

function showPic(name) { 
	file = "{{asset('images')}}"+"/" + name + ".png";
	$("#captain").attr("src",file);
} 
function showPic2(name) { 
	file = "{{asset('images')}}"+"/" + name + ".png";
	$("#captain2").attr("src",file);
} 
function showPic3(name) { 
	file = "{{asset('images')}}"+"/" + name + ".png";
	$("#need").attr("src",file);
} 


</script>
@endsection

@section('scriptfoot')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Add Friends</div>

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
		  
          <form action="{{ URL('friend') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            ID:
			<input type="text" name="pad_id" class="form-control" required="required">
			<br>
			Captain:
			<select class="form-control" name="captain_id" id="captain_id" onChange="showPic(this.value)">
			<option value="">Please Select</option>
		@foreach ($item as $items)
			<option value="{{$items->id}}">{{$items->id}}-{{$items->name}}</option>
        @endforeach
		</select>
<img id="captain"  class = "img-responsive"/>
<br>

			Captain_2:
			<select class="form-control" name="captain_2_id" onChange="showPic2(this.value)">
			<option value="">Please Select</option>
		@foreach ($item as $items)
			<option value="{{$items->id}}">{{$items->id}}-{{$items->name}}</option>
		@endforeach
			</select>
			<img id="captain2" class = "img-responsive"/>
            <br>

            Need:
			<select class="form-control" name="need_id" onChange="showPic3(this.value)">
			<option value="">Please Select</option>
		@foreach ($item as $items)
			<option value="{{$items->id}}">{{$items->id}}-{{$items->name}}</option>
		@endforeach
			</select>
			<img id="need" class = "img-responsive"/>
            <br>
            Comment:
			<input type="text" name="text" class="form-control" required="required">
			<br>
{!! Recaptcha::render() !!}
<br>
			<button class="btn btn-lg btn-info">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection