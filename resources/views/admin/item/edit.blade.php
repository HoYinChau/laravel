@extends('adminWelcome')

@section('title')
Edit All Item
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

          <form action="{{ URL('admin/item/'.$item->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            ID:<input type="text" name="id" class="form-control" required="required" value="{{ $item->id }}" readonly>
            <br>
			Name:<input type="text" name="name" class="form-control" required="required" value="{{ $item->name }}">
            <br>
			Captain Skill:<input type="text" name="activeSkillName" class="form-control" required="required" value="{{ $item->activeSkillName }}">
            <br>
			Effect:<input type="text" name="activeSkill" class="form-control" required="required" value="{{ $item->activeSkill }}">
            <br>
			Skill:<input type="text" name="passiveSkillName" class="form-control" required="required" value="{{ $item->passiveSkillName }}">
            <br>
			Effect:<input type="text" name="passiveSkill" class="form-control" required="required" value="{{ $item->passiveSkill }}">
			Image Name:<input type="text" name="imgLink" class="form-control" required="required" value="{{ $item->imgLink }}">
            <br>			
            <button class="btn btn-lg btn-info">Edit Page</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection