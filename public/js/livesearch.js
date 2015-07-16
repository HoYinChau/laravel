$('#search').keyup(function () { 
    var searchField = $('#search').val();
    if (searchField.length)
    {        
    var myExp = new RegExp(searchField, "i");
    var found = 0;

$.getJSON('{{asset('/json/data1.json')}}', function (data) {
   var output = '<ul class="searchresults">';

   $.each(data, function(key, val) {
      if (val.title.search(myExp) !== -1) {
      console.log(val);
           found = 1;
      output += '<li>';
      output += '<h2>' + val.title + '</h2>';
      output += "<a href=" + val.website + ' target="_blank" >website</a>';
      output += '</li>';
      } 
   });
      output += '</ul>';
      if (found==1) {
      $('#update').removeClass('update-hidden');
      $('#update').html(output);
      }
      else {
          $('#update').addClass('update-hidden');
      }

});
    } else {
      $('#update').addClass('update-hidden');
    }
});