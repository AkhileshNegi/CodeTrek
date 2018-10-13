$(document).ready(function(){
    $("#like").click(function(){
    if($("#like").hasClass("text-success")){
    		$("#like").removeClass("text-success");	
    		var like_count = $("#like_count").html();
	        like_count--;
        	$("#like_count").html(like_count);
    	}
    	else{
	        $("#like").addClass("text-success");
	        if($("#dislike").hasClass("text-danger")){
		        $("#dislike").removeClass("text-danger");
	        	var dislike_count = $("#dislike_count").html();
	        	dislike_count--;
        		$("#dislike_count").html(dislike_count);
	        }
	        var like_count = $("#like_count").html();
	        like_count++;
	        $("#like_count").html(like_count);
        }
    });
    $("#dislike").click(function(){
    	if($("#dislike").hasClass("text-danger")){
    		$("#dislike").removeClass("text-danger");
    		var dislike_count = $("#dislike_count").html();
	        dislike_count--;
        	$("#dislike_count").html(dislike_count);	
    	}
    	else{
	        $("#dislike").addClass("text-danger");
	        if($("#like").hasClass("text-success")){
				var like_count = $("#like_count").html();
		        like_count--;
	        	$("#like_count").html(like_count);
			}
	        $("#like").removeClass("text-success");
	        var dislike_count = $("#dislike_count").html();
        	dislike_count++;
       		$("#dislike_count").html(dislike_count);
        }
    });
});