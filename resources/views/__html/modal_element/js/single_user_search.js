$(document).ready(function(){
	  $("#user").keyup(function(){
			var searchField = $('#user').val();
			//alert(searchField);
			var myExp = new RegExp(searchField, "i");
			var json = 'http://localhost/file/admin/home/find_user/'+searchField;
			//alert(json);
			$.getJSON(json, function(data){
					$('#finalResult').show();
							var output='<p>Search Results For Username</p>';
							if(searchField.length >2)
							{
								$.each(data, function(key, val){
											output += '<a href="http://localhost/file/admin/home/get_files/'+val.id+'"><p>' + val.first_name +'&nbsp;'+ val.last_name+'('+ val.mobile + 	                                                   ')</a></p>';
							});
							}else{
							     output='<p>Type atleast three letters to get results.</p>';
							};
					$('#finalResult').html(output);
					
		    }).error(function() { alert("error"); });
	   });
   });	
	
