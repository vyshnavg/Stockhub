$(document).ready(function(){
	$("#search").keyup(function(){
		if($("#search").val().length<=2){
			$('#finalResult').html('');
		}
		if($("#search").val().length>2){
			$.ajax({
				type: "post",
				url: "http://localhost/Stockhub/Materials/homesearch",
				cache: false,    
				data:'search='+$("#search").val(),
				
				success: function(response){
					$('#finalResult').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
							var items=[];
							var temp=0;
							
							$.each(obj, function(i,val){           
								// items.push($('<a/>').text(val.rm_name));
								// items.push($('<a>'.text(val.rm_name).'</a>'));
								items.push('<a class="list-group-item linkInSearch" href="http://localhost/Stockhub/materials/'+val.rm_slug+'"> <b>'+ val.rm_name +'</b></a>');

								if(temp==0){
									items.push('<a class="list-group-item linkInSearch" href="http://localhost/Stockhub/materials#'+val.subcat_name+'"> <b> Category : '+ val.subcat_name +'</b></a>');
								}
								temp=temp+1;
							}); 
							$('#finalResult').append.apply($('#finalResult'), items);
						}catch(e) {  
							alert('Exception while request.',e);
						}
					}else{
						// $('#finalResult').html($('<li/>').text("No Data Found"));  
						$('#finalResult').html('<a class="list-group-item linkInSearch"> <b>Your search did not match any items. Please make sure that all words are spelled correctly.</b></a>'); 
					}
				},

				error: function(){
				alert('Error while request (Backend Error)');
				}
			});
		}
   	return false;
	});
});

$(document).ready(function(){
	var text = ["Search Raw Materials", "Search Products", "Search Categories" , "Search Prices"];
	var counter = 0;
	var elem = document.getElementById("search");
	setInterval(change, 1500);

	function change() {
	elem.placeholder = text[counter];
	counter++;
		if (counter >= text.length) {
			counter = 0;
		}
	}
});