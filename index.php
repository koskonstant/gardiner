<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: home.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){
		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (`username`,`password`,`email`,`USR_DoB`,`USR_Gender_Id`,`USR_ProfilePicture`,`USR_FName`,`USR_MName`,`USR_LName`,`USR_PoB`,`USR_Race`,`USR_ResAddrStreet`,`USR_ResAddrZip`,`USR_ResAddrCity`,`USR_ResAddrState`,`USR_ResAddrCountry`,`USR_PhoneNum`,`USR_ProfileURL`,`USR_WebsiteURL`,`Lang_ID`,`USR_Work`,`USR_Interests`, `active`) VALUES (:username, :password, :email, :USR_DoB, :USR_Gender_Id, :USR_ProfilePicture, :USR_FName, :USR_MName, :USR_LName, :USR_PoB, :USR_Race, :USR_ResAddrStreet, :USR_ResAddrZip, :USR_ResAddrCity, :USR_ResAddrState, :USR_ResAddrCountry, :USR_PhoneNum, :USR_ProfileURL, :USR_WebsiteURL, :Lang_ID, :USR_Work, :USR_Interests, :active)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':USR_DoB' => $_POST['USR_DoB'],
				':USR_Gender_Id' => 'M',
				':USR_ProfilePicture' => $_POST['USR_ProfilePicture'],
				':USR_FName' => $_POST['USR_FName'],
				':USR_MName' => $_POST['USR_MName'],
				':USR_LName' => $_POST['USR_LName'],
				':USR_PoB' => $_POST['USR_PoB'],
				':USR_Race' => $_POST['USR_Race'],
				':USR_ResAddrStreet' => $_POST['USR_ResAddrStreet'],
				':USR_ResAddrZip' => $_POST['USR_ResAddrZip'],
				':USR_ResAddrCity' => $_POST['USR_ResAddrCity'],
				':USR_ResAddrState' => $_POST['USR_ResAddrState'],
				':USR_ResAddrCountry' => $_POST['USR_ResAddrCountry'],
				':USR_PhoneNum' => $_POST['USR_PhoneNum'],
				':USR_ProfileURL' => $_POST['USR_ProfileURL'],
				':USR_WebsiteURL' => $_POST['USR_WebsiteURL'],
				':Lang_ID' => 'EN',
				':USR_Work' => $_POST['USR_Work'],
				':USR_Interests' => $_POST['USR_Interests'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//send email
			$to = $_POST['email'];
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering at demo site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."/activate.php?x=$id&y=$activasion'>".DIR."/activate.php?x=$id&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Demo';

//include header template
require('layout/header.php');
require('layout/nav.php');
?>


<div class="container">

	<div class="row">
		<div class="col-md-12">
			<section>
		        <div class="overlay">
		            <div class="container text-center">
		                <div class="editContent">
		                    <h2>Please Sign Up</h2>
		                </div>                
		            </div>
		        </div>
		    </section>
		</div>
		<div class="signup-form">
		    <div class="col-md-3">
		      <div class="sf-nav-wrap">
		        <ul id="progressbar" class="sf-nav">
		          <li class="active sf-nav-step sf-li-number sf-nav-link sf-active first-step previous">
		            <span class="sf-nav-subtext">Personal Information</span>
		            <div class="sf-nav-number">
		              <span class="sf-nav-number-inner">1</span>
		            </div>
		          </li>
		          <li class="sf-nav-step sf-li-number sf-nav-link next previous2">
		            <span class="sf-nav-subtext">Residence and Web Apperiance</span>
		            <div class="sf-nav-number">
		              <span class="sf-nav-number-inner">2</span>
		            </div>
		          </li>
		          <li class="sf-nav-step sf-li-number sf-nav-link next2">
		            <span class="sf-nav-subtext">Work and Education</span>
		            <div class="sf-nav-number">
		              <span class="sf-nav-number-inner">3</span>
		            </div>
		          </li>
		        </ul>
		      </div>
		    </div>
		    <div class="col-md-9">
		      	<form id="forma"role="form" method="post" action="" autocomplete="off">
				<?php		
				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>
			        <div class="step1">
			        	<div class="row">				        	
				          	<div class="input-field col-sm-4">
		                        <i class="material-icons prefix">account_circle</i>
		                        <input type="text" name="USR_FName" id="form-USR-FName" class="form-control input-md check_mandatory" tabindex="1">
		                        <label for="USR_FName">First Name</label>
		                        <span class="myerror" id="USR-FName_error_message"></span>
		                    </div>
		                    <div class="input-field col-sm-4">
		                        <i class="material-icons prefix">account_circle</i>
		                        <input type="text" name="USR_MName" id="form-USR-MName" class="form-control input-md" tabindex="1">
		                        <label for="USR_MName">Middle Name</label>
		                        <span class="myerror" id="USR-MName_error_message"></span>
		                    </div>
		                    <div class="input-field col-sm-4">
		                        <i class="material-icons prefix">account_circle</i>
		                        <input type="text" name="USR_LName" id="form-USR-LName" class="form-control input-md" tabindex="1">
		                        <label for="USR_LName">Last Name</label>
		                        <span class="myerror" id="USR-LName_error_message"></span>
		                    </div>
		                </div>
		                <div class="row">
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">account_circle</i>
	                            <input type="text" name="username" id="form-username" class="form-control input-md" tabindex="1">
	                            <label for="username">Username</label>
	                            <span class="myerror" id="username_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">vpn_key</i>
	                            <input type="password" name="password" id="form-password" class="form-control input-md" tabindex="3">
	                            <label for="password">Password</label>
	                            <span class="myerror" id="password_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">vpn_key</i>
	                            <input type="password" name="passwordConfirm" id="form-passwordConfirm" class="form-control input-md" tabindex="4">
	                            <label for="passwordConfirm">Confirm Password</label>
	                            <span class="myerror" id="passwordConfirm_error_message"></span>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="input-field col-sm-12">
	                            <i class="material-icons prefix">email</i>
	                            <input type="text" name="email" id="form-email" class="form-control input-md" tabindex="2">
	                            <label for="email">Email</label>
	                            <span class="myerror" id="email_error_message"></span>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">view_list</i>
	                            <select id="USR_Gender">
	                                <option value="" disabled selected>Choose Gender</option>
	                                <option value="1">Male</option>
	                                <option value="2">Female</option>
	                                <option value="2">Other</option>
	                            </select>
	                            <label for="USR_Gender">Gender</label>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">today</i>
	                            <input type="text" name="USR_DoB" id="form-date-birth" class="form-control input-md datepicker" tabindex="1">
	                            <label for="date-birth">Date of Birth</label>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_PoB" id="form-place-birth" class="form-control input-md" tabindex="1">
	                            <label for="USR_PoB">Place of Birth</label>
	                            <span class="myerror" id="USR-PoB_error_message"></span>
	                        </div>
	                    </div>			          
			          	<button type="submit" class="next-btn btn-game sf-right sf-btn sf-btn-next subutton next">Next</button>
			        </div>
			        
			        <div class="step2">					        
				        <div class="row">
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">call_end</i>
	                            <input type="text" name="USR_PhoneNum" id="form-phone" class="form-control input-md" tabindex="2">
	                            <label for="USR_PhoneNum">Phone Number</label>
	                            <span class="myerror" id="phone_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">http</i>
	                            <input type="text" name="USR_ProfileURL" id="form-profile-url" class="form-control input-md" tabindex="2">
	                            <label for="USR_ProfileURL">Profile URL</label>
	                            <span class="myerror" id="profile-url_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">http</i>
	                            <input type="text" name="USR_WebsiteURL" id="form-website-url" class="form-control input-md" tabindex="2">
	                            <label for="USR_WebsiteURL">Website URL</label>
	                            <span class="myerror" id="website-url_error_message"></span>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_ResAddrStreet" id="street" class="form-control input-md" tabindex="2">
	                            <label for="USR_ResAddrStreet">Residence Address Street</label>
	                            <span class="myerror" id="res_address_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_ResAddrZip" id="zip" class="form-control input-md" tabindex="2">
	                            <label for="USR_ResAddrZip">Residence Zip Code</label>
	                            <span class="myerror" id="zip_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-4">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_ResAddrCity" id="city" class="form-control input-md" tabindex="2">
	                            <label for="USR_ResAddrCity">Residence Address City</label>
	                            <span class="myerror" id="city_error_message"></span>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="input-field col-sm-6">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_ResAddrState" id="state" class="form-control input-md" tabindex="2">
	                            <label for="USR_ResAddrState">Residence Address State</label>
	                            <span class="myerror" id="state_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-6">
	                            <i class="material-icons prefix">location_on</i>
	                            <input type="text" name="USR_ResAddrCountry" id="country" class="form-control input-md" tabindex="2">
	                            <label for="USR_ResAddrCountry">Residence Address Country</label>
	                            <span class="myerror" id="country_error_message"></span>
	                        </div>
	                    </div>		          
						<div class="new"></div>
						<button type="submit" class="prev-btn sf-left sf-btn btn-game sf-btn-prev subutton previous left pull-left">Previous</button>
						<button type="submit" class="next-btn btn-game sf-right sf-btn sf-btn-next subutton next2 pull-right">Next</button>			          
			      	</div>
			      	<div class="step3">
			      		<div class="alert alert-danger" role="alert" id="alert">
				          	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				          	<span class="sr-only"></span>
				        </div>
						<div class="row">
	                        <div class="input-field col-sm-6">
	                            <i class="material-icons prefix">work</i>
	                            <input type="text" name="USR_Work" id="form-occupation_current" class="form-control input-md" tabindex="2">
	                            <label for="USR_Work">Current Occupation</label>
	                            <span class="myerror" id="occupation_current_error_message"></span>
	                        </div>
	                        <div class="input-field col-sm-6">
	                            <i class="material-icons prefix">interests</i>
	                            <input type="text" name="USR_Interests" id="form-user-interests" class="form-control input-md" tabindex="1">
	                            <label for="USR_Interests">Interests</label>
	                        </div>                           
	                    </div>
	                    <div class="row">
	                        <div class="input-field col col-sm-12">
	                            <i class="material-icons prefix">view_list</i>
	                            <select>
	                                <option value="" disabled selected>Add Education Level</option>
	                                <option value="1">ISCED 0: Early childhood education (‘less than primary’ for educational attainment).</option>
	                                <option value="2">ISCED 1: Primary education.</option>
	                                <option value="3">ISCED 2: Lower secondary education.</option>
	                                <option value="4">ISCED 3: Upper secondary education.</option>
	                                <option value="4">ISCED 4: Post-secondary non-tertiary education.</option>
	                                <option value="4">ISCED 5: Short-cycle tertiary education.</option>
	                                <option value="4">ISCED 6: Bachelor’s or equivalent level.</option>
	                                <option value="4">ISCED 7: Master’s or equivalent level.</option>
	                                <option value="4">ISCED 8: Doctoral or equivalent level.</option>
	                            </select>
	                        </div>                            
	                    </div>                    
					    <button type="submit" class="prev-btn sf-left sf-btn btn-game sf-btn-prev subutton previous2 left pull-left">Previous</button>
			          	<input type="submit" id="btnSubmit" name="submit" value="Register" class="btn btn-primary btn-game btn-block btn-lg pull-right" tabindex="5">
			        </div>
		      	</form>
		    </div>
		</div>		
	</div>
</div>
          
<?php
//include header template
require('layout/footer.php');
?>

