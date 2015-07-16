@extends('welcome')

@section('title')
Collection
@endsection

@section('collectionActive')
class="active"
@endsection

@section('scripthead')
        <style>
            .update-hidden {
                display: none !important;
            }
        </style>




@endsection

@section('scriptfoot')

<script>
$('#search').keyup(function () { 
    var searchField = $('#search').val();
    if (searchField.length)
    {   
	//var myExp = '^([0-9]|[1-9][0-9]|[1-9][0-9][0-9])$';
    var myExp = new RegExp(searchField, "gm");
    var found = 0;

   $.getJSON('{{asset('json/data.json')}}', function (data) {
   var output = '<div class="table-responsive">';

   $.each(data, function(key, val) {
      if (val.id.match(myExp)) {
      console.log(val);
      found = 1;
      output += '<table class="table table-hover">';
      output += 
	  '<tr><td colspan="3"><img src="{{asset('images/')}}'+'/'+val.imgLink+'.png" class="img-responsive"></td></tr>';
      output += '<tr><td>&#21517;&#31281;&#65306;</td><td colspan="2">'+val.name+'</td></tr><br>';
      output += '<tr><td>&#20027;&#21205;&#25216;&#33021;&#65306;</td><td>'+val.passiveSkillName+'</td>';
      output += '<td>'+val.passiveSkill+'</td></tr><br>';
      output += '<tr><td>&#34987;&#21205;&#25216;&#33021;&#65306;</td><td>'+val.activeSkillName+'</td>';
      output += '<td>'+val.activeSkill+'</td></tr>';
	  
      } 
   });
      output += '</table>';
      output += '</div>';
      if (found==1) {
		$('#itemList').addClass('update-hidden');
		$('.pagination').addClass('update-hidden');
      $('#update').removeClass('update-hidden');
      $('#update').html(output);
      }
      else {
          $('#update').addClass('update-hidden');
		$('#itemList').removeClass('update-hidden');
		$('.pagination').removeClass('update-hidden');
      }

});
    } else {
      $('#update').addClass('update-hidden');
	  		$('#itemList').removeClass('update-hidden');
		$('.pagination').removeClass('update-hidden');

    }
});


 </script>
@endsection

@section('content')
<div class="container">  
  <div class="row">	  
        <div id="searcharea">
            <label for="search">Search By ID:</label>
            <input type="text" name="search" id="search" placeholder="ID" />

        </div>
<br>	
        <div id="update" class="update-hidden">test</div>
<div id="itemList">
			@foreach ($items as $item)
              <div class="content col-xs-4 col-md-2 col-lg-1" >
				<a data-toggle="modal" data-target="#modal{{ $item->id }}">
				<img src="{{ asset('/images/'.$item->imgLink.'.png') }}" class = "img-responsive" id="{{$item->id}}"/>
				</a>

<!-- Modal -->
<div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="{{$item->id}}">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Detail</h4>
      </div>
      <div class="modal-body">
            <div class="table-responsive">
             <table class="table table-hover">
             <tr>
             	<td>ID:</td> <td>{{ $item->id }}</td>
              </tr>
              
              <tr>
             	<td>Name:</td> <td>{{$item->name}}</td>
              </tr>
              
              <tr>
             	<td>Captain Skill:</td> <td>{{$item->activeSkillName}}</td>
              </tr>
              
              <tr>
             	<td>Effect:</td> <td>{{$item->activeSkill}}</td>
              </tr>
              
              <tr>
             	<td>Skill:</td> <td>{{$item->passiveSkillName}}</td>
              </tr>
                
              <tr>
                <td>Effect:</td> <td>{{$item->passiveSkill}}</td>
             </tr>
             </table>          
			</div>				
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


              </div>
			@endforeach
			<br>
</div>

  </div>
</div> 
<center>
     <p id="itemList"><?php  echo $items->render(); ?>     </p>
 </center>


 
@endsection