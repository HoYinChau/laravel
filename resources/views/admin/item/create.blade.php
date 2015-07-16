@extends('adminWelcome')

@section('title')
Add All Item
@endsection

@section('itemActive')
class="active"
@endsection

@section('itemAddActive')
class="active"
@endsection

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Add Item</div>

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

          <form action="{{ URL('admin/item') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            Name:<input type="text" name="name" class="form-control" required="required">
            <br>
            Captain Skill:<input type="text" name="activeSkillName" class="form-control" required="required">
            <br>
            Effect:<input type="text" name="activeSkill" class="form-control" required="required">
            <br>
            Skill:<input type="text" name="passiveSkillName" class="form-control" required="required">
            <br>
            Effect:<input type="text" name="passiveSkill" class="form-control" required="required">
            <br>
			Image Name:<input type="text" name="imgLink" class="form-control" required="required">
			<br>
            <button class="btn btn-lg btn-info">Add	Page</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection