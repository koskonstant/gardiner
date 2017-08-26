$(function() {

	$("#category_error_message").hide();
	$("#title_error_message").hide();
	$("#tag_error_message").hide();
	$("#url_error_message").hide();
	$("#source_error_message").hide();
	$("#image_error_message").hide();
	$("#tag_error_message").hide();
	$("#rating_error_message").hide();
	$("#dateCreated_error_message").hide();
	$("#dateUpdated_error_message").hide();
	$("#body_error_message").hide();
	$("#video_error_message").hide();

	$("#name_error_message").hide();
	$("#nickname_error_message").hide();
	$("#location_error_message").hide();
	$("#authorURL_error_message").hide();
	$("#authorImage_error_message").hide();
	$("#biography_error_message").hide();

	var error_category = false;
	var error_title = false;
	var error_url = false;
	var error_image = false;
	var error_tag = false;
	var error_rating = false;
	var error_dateCreated = false;
	var error_dateUpdated = false;
	var error_body = false;
	var error_source = false;
	var error_video = false;

	var error_name = false;
	var error_nickname = false;
	var error_location = false;
	var error_authorURL = false;
	var error_authorImage = false;
	var error_biography = false;

	$("#form_category").focusout(function() {

		check_category();
		
	});

	$("#form_title").focusout(function() {

		check_title();
		
	});


	$("#form_url").focusout(function() {

		check_url();
		
	});
	
	$("#form_source").focusout(function() {

		check_source();
		
	});
	
	$("#form_urlImage").focusout(function() {

		check_urlImage();
		
	});
	
	$("#form_video").focusout(function() {

		check_video();
		
	});
	
	$("#form_tag").focusout(function() {
		check_tag();
		
	});

	$("#form_keyword").focusout(function() {
		check_keyword();
		
	});

	$("#form_rating").focusout(function() {

		check_rating();
		
	});

	$("#form_rating").focusout(function() {

		check_dateCreated();
		
	});	
	
	$("#form_dateCreated").focusout(function() {

		check_dateCreated();
		
	});

	$("#form_dateUpdated").focusout(function() {

		check_dateUpdated();
		
	});	

	$("#form_author").focusout(function() {

		check_author();
		
	});
	
	$("#form_nickname").focusout(function() {

		check_nickname();
		
	});	

	$("#form_location").focusout(function() {

		check_location();
		
	});	
	
	$("#form_authorURL").focusout(function() {

		check_authorURL();
		
	});	
	
	$("#form_authorImage").focusout(function() {

		check_authorImage();
		
	});	


	function check_category() {
	
		var category_length = $("#form_category").val().length;
		
		if((category_length > 0 && category_length<2) || category_length > 20) {
			$("#category_error_message").html("Article category should be between 2-20 characters");
			$("#category_error_message").show();
			error_category=false;
		} else {
			error_category = true;
			$("#category_error_message").hide();
		}
	
	}

	function check_title() {
	
		var title_length = $("#form_title").val().length;
		
		if(title_length < 5 && title_length>0) {
			$("#title_error_message").html("Article title should be at least 5 characters");
			$("#title_error_message").show();
			error_title=false;
		} else if(title_length==0){
			$("#title_error_message").html("Article title is mandatory");
			$("#title_error_message").show();
			error_title=false;
		}else{
			error_title = true;
			$("#title_error_message").hide();
		}
	
	}
	
	function check_url() {

		var pattern = new RegExp( /^(ftp|http|https):\/\/[^ "]+$/);
	
		if(pattern.test($("#form_url").val()) || $("#form_url").val().length==0) {
			$("#url_error_message").hide();
			error_url = true;
		} else {
			error_url=false;
			$("#url_error_message").html("Invalid url");
			$("#url_error_message").show();
			
		}
	}
	
	function check_source() {

		var pattern = new RegExp( /^(ftp|http|https):\/\/[^ "]+$/);
	
		if(pattern.test($("#form_source").val()) || $("#form_source").val().length==0) {
			$("#source_error_message").hide();
			error_source = true;
		} else {
			error_source=false;
			$("#source_error_message").html("Invalid url");
			$("#source_error_message").show();
			
		}
	}
	
function check_urlImage() {

		var pattern = new RegExp( /^(ftp|http|https):\/\/[^ "]+$/);
	
		if(pattern.test($("#form_urlImage").val()) || $("#form_urlImage").val().length==0) {
			$("#image_error_message").hide();
			error_image = true;
		} else {
			error_image=false;
			$("#image_error_message").html("Invalid url");
			$("#image_error_message").show();
			
		}
	}
	
function check_video() {

		var pattern = new RegExp(/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/);
	
		if(pattern.test($("#form_video").val()) || $("#form_video").val().length==0) {
			$("#video_error_message").hide();
			error_video = true;
		} else {
			error_image=false;
			$("#video_error_message").html("Invalid url, enter youtube url");
			$("#video_error_message").show();
			
		}
	}

	function check_tag() {
		$('#form_tag').tokenfield();
		var tag_length = $("#form_tag").val().length;
		
		if(tag_length<2 && tag_length>0) {
			$("#tag_error_message").html("Article tags should be at least 2 characters");
			$("#tag_error_message").show();
		} else {
			$("#tag_error_message").hide();
			error_tag= true;
		}
	
	}

	function check_keyword() {
		$('#form_keyword').tokenfield();
		var keyword_length = $("#form_keyword").val().length;
		
		if(keyword_length<2 && keyword_length>0) {
			$("#keyword_error_message").html("Article keywords should be at least 2 characters");
			$("#keyword_error_message").show();
		} else {
			$("#keyword_error_message").hide();
			keyword_tag= true;
		}
	
	}
	
	function check_rating() {

		var rating = $("#form_rating").val();
	
		if(isNaN(rating) && rating.length!=0) {
			$("#rating_error_message").html("Rating should be a number");
			$("#rating_error_message").show();
			error_rating = false;
		}else if(rating<=0 && rating.length!=0){
			$("#rating_error_message").html("Rating should be a positive number");
			$("#rating_error_message").show();
			error_rating = false;
		}else if(rating>5 && rating.length!=0){
			$("#rating_error_message").html("Rating should be until 5");
			$("#rating_error_message").show();
			error_rating = false;
		}else{
			$("#rating_error_message").hide();
			error_rating = true;
		}
	
	}	

	function check_dateCreated() {
		error_dateCreated = true;
	}

	function check_dateUpdated() {
		error_dateUpdated = true;
	}
	
	function check_body() {
			var bodyl = tinyMCE.get('form_body').getContent().length;
			if(bodyl<10){
			$("#body_error_message").html("Body should contain more characters");
			$("#body_error_message").show();
			error_body=false;
		}else{
			$("#body_error_message").hide();
			error_body=true;
		}
	}

	
	function check_author() {

		var author_length = $("#form_author").val().length;
	
		if(author_length==0) {
			$("#name_error_message").html("Author name is mandatory");
			$("#name_error_message").show();
		} else if(author_length<2) {
			$("#name_error_message").html("Author name should be at least 2 characters");
			$("#name_error_message").show();
		}else{
			$("#name_error_message").hide();
			error_name = true;
		}
	
	}
	
	function check_nickname() {

		var nickname_length = $("#form_nickname").val().length;
	
		if(nickname_length<2 && nickname_length>0 ) {
			$("#nickname_error_message").html("Nickname should be at least 2 characters");
			$("#nickname_error_message").show();
		}else{
			$("#nickname_error_message").hide();
			error_nickname = true;
		}
	
	}
	
	function check_location() {

		var location_length = $("#form_location").val().length;
	
		if(location_length<2 && location_length>0 ) {
			$("#location_error_message").html("Location should be at least 2 characters");
			$("#location_error_message").show();
		}else{
			$("#location_error_message").hide();
			error_location = true;
		}
	
	}
	
	function check_authorURL() {

		var pattern = new RegExp( /^(ftp|http|https):\/\/[^ "]+$/);
	
		if(pattern.test($("#form_authorURL").val()) || $("#form_authorURL").val().length==0) {
			$("#authorURL_error_message").hide();
			error_authorURL = true;
		} else {
			error_authorURL=false;
			$("#authorURL_error_message").html("Invalid url");
			$("#authorURL_error_message").show();
			
		}
	}
	
	function check_authorImage() {

		var pattern = new RegExp( /^(ftp|http|https):\/\/[^ "]+$/);
	
		if(pattern.test($("#form_authorImage").val()) || $("#form_authorImage").val().length==0) {
			$("#authorImage_error_message").hide();
			error_authorImage = true;
		} else {
			error_authorImage=false;
			$("#authorImage_error_message").html("Invalid url");
			$("#authorImage_error_message").show();
			
		}
	}
	


	$("#forma").submit(function() {
			check_title();
			check_category();
			check_url();
			check_source();
			check_urlImage();
			check_video();
			check_tag();
			check_keyword();
			check_rating();
			check_dateCreated();
			check_dateUpdated();
			check_body();
			
			check_author();
			check_nickname();
			check_authorURL();
			check_authorImage();
			var flag1 = true;
			var flag2 = true;
		
		if(error_category==false || error_title==false || error_url==false || error_image==false || error_tag==false || error_rating==false || error_dateCreated==false || error_dateUpdated==false || error_body==false || error_source==false || error_video==false) {
			flag1=false;
		}
		if( error_name==false || error_nickname==false || error_authorURL==false || error_authorImage==false){
			flag2=false;
		}
		
		if(flag1==false && flag2==true){
			$("#alert").html("Error: Please go back and check error messages");
			$("#alert").slideDown( "slow" );
			return false;	
		}else if(flag2==false && flag1==true){
			$("#alert").html("Error: Please check error messages in this step");
			$("#alert").slideDown( "slow" );
			return false;	
		}else if(flag1==false && flag2==false){
			$("#alert").html("Error: Please check error messages in both steps");
			$("#alert").slideDown( "slow" );
			return false;	
		}else {
			return true;
		}

	});

});