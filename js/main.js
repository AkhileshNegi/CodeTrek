$(document).ready(function(){
    function decrease_like(){
        var like_count = $("#like_count").html();
        like_count--;
        $("#like_count").html(like_count);
    }
    function decrease_dislike(){
        var dislike_count = $("#dislike_count").html();
        dislike_count--;
        $("#dislike_count").html(dislike_count);
    }
    $("#like").click(function(){
    if($("#like").hasClass("text-success")){
		$("#like").removeClass("text-success");	
		decrease_like();
	}
	else{
        $("#like").addClass("text-success");
        if($("#dislike").hasClass("text-danger")){
	        $("#dislike").removeClass("text-danger");
            decrease_dislike();
        }
        var like_count = $("#like_count").html();
        like_count++;
        $("#like_count").html(like_count);
    }
    });
    $("#dislike").click(function(){
	if($("#dislike").hasClass("text-danger")){
		$("#dislike").removeClass("text-danger");
        decrease_dislike();	
	}
	else{
        $("#dislike").addClass("text-danger");
        if($("#like").hasClass("text-success")){
            decrease_like();
		}
        $("#like").removeClass("text-success");
        var dislike_count = $("#dislike_count").html();
    	dislike_count++;
   		$("#dislike_count").html(dislike_count);
    }
    });
});