$(function() {

	$("#username_error_message").hide();
	$("#USR-FName_error_message").hide();
	$("#USR-MName_error_message").hide();
	$("#USR-LName_error_message").hide();
	$("#email_error_message").hide();
	$("#passwordConfirm_error_message").hide();
	


	var error_username = false;
	var error_fname = false;
	var error_mname = false;
	var error_lname = false;
	var error_email = false;
	var error_password = false;

	$("#form_username").focusout(function() {
		check_username();		
	});	

	$("#form-USR-FName").focusout(function() {
		check_fname();		
	});	

	$("#form-USR-MName").focusout(function() {
		check_mname();		
	});	

	$("#form-USR-LName").focusout(function() {
		check_lname();		
	});	

	$("#form-email").focusout(function() {
		check_email();		
	});	

	$("#form-passwordConfirm").focusout(function() {
		check_password();		
	});	



	
	

	function check_username() {
	
		var username_length = $("#form-username").val().length;
		
		if(username_length===0){
			$("#username_error_message").html("Username is mandatory");
			$("#username_error_message").show();
			error_username=false;
		}else{
			error_username = true;
			$("#username_error_message").hide();
		}
	
	}	

	
	function check_fname() {

		var fname_length = $("#form-USR-FName").val().length;
	
		if(fname_length===0) {
			$("#USR-FName_error_message").html("First Name is mandatory");
			$("#USR-FName_error_message").show();		
		}else{
			$("#USR-FName_error_message").hide();
			error_fname = true;
		}
	
	}

	function check_mname() {

		var mname_length = $("#form-USR-MName").val().length;
	
		if(mname_length===0) {
			$("#USR-MName_error_message").html("Middle Name is mandatory");
			$("#USR-MName_error_message").show();		
		}else{
			$("#USR-MName_error_message").hide();
			error_mname = true;
		}
	
	}

	function check_lname() {

		var lname_length = $("#form-USR-LName").val().length;
	
		if(lname_length===0) {
			$("#USR-LName_error_message").html("Last Name is mandatory");
			$("#USR-LName_error_message").show();		
		}else{
			$("#USR-LName_error_message").hide();
			error_lname = true;
		}
	
	}

	function check_email() {
		var sEmail = $('#form-email').val();
		var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if ($('#form-email').val().length === 0 ) {
				$("#email_error_message").html("E-mail is mandatory");
				$("#email_error_message").show();
			} else if (filter.test(sEmail)) {
				$("#email_error_message").hide();
				error_email = true;
			} else {
				$("#email_error_message").html("Invalid E-mail");
				$("#email_error_message").show();
				}
			}
	

		
	

	function check_password() {
		var password = $("#form-password").val();		
        var confirmPassword = $("#form-passwordConfirm").val();
        if (password != confirmPassword) {
            $("#passwordConfirm_error_message").html("Passwords do not match");
			$("#passwordConfirm_error_message").show();		
		}else{
			$("#passwordConfirm_error_message").hide();
			error_password = true;            
        }
    }

	
	
	$("#forma").submit(function() {
		check_username();
		check_fname();
		check_mname();
		check_lname();
		check_email();
		check_password();
		

		var flag1 = true;
		
		if(error_username===false || error_fname===false || error_mname===false || error_lname===false || error_email === false || error_password === false) {
			flag1=false;
		}
		
		
		if(flag1===false){
			$("#alert").html("Error: Please go back and check error messages");
			$("#alert").slideDown( "slow" );
			return false;		
		
		}else {
			return true;
		}

	});

});