@extends('adminWelcome')

@section('title')
Show All Item
@endsection

@section('itemActive')
class="active"
@endsection

@section('showAllItemActive')
class="active"
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Index Of Admin</div>

        <div class="panel-body">

@foreach ($item as $items)
            <hr>
            <div class="page">
              <h4></h4>
              <div class="content">
                <p>
				ID:{{ $items->id }}
				<br>
                </p>
              </div>
            </div>
            <a href="{{ URL('admin/item/'.$items->id.'/edit') }}" class="btn btn-success">Edit</a>
			<form action="{{ URL('admin/item/'.$items->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
			@endforeach
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection