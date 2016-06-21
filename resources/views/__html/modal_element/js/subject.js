var siteurl='http://127.0.0.1:144/index.php/';
$(document).ready(function(){
	  $(".memberboxxx01 input[type=radio]").click(function(){
		//var searchField = $('#search').val();
		var checking_id = $(this).attr('id');
		//alert(checking_id);
			var myExp = new RegExp(checking_id, "i");
			
			var json = siteurl+"student/get_sub_by_id/"+checking_id;
			//alert(json);
			$.getJSON(json, function(data){
					$('#finalResult').show();				 
					var output='<div class="memberboxxx01">';
								

						//if(data!=''){
						//if(count(data)>0){
							$.each(data, function(key, val){
								if((val.id.search(myExp) != -1) || (val.id.search(myExp) != -1)){
										output += '<a href="http://127.0.0.1:144/index.php/student/subject_delete/'+val.id+'">Delete</a>';
										output += '</div>';
										output += '<div class="clear"></div>';
										output += '</div>';
									}
							});
					$('#finalResult').html(output);
			}).error(function() { alert("error"); });	 
		});
	});	
	