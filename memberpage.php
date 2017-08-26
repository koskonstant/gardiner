<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php');
require('layout/nav.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 text-center">
			
				<h2>Member page - Welcome <?php echo $_SESSION['username']; ?></h2>

		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
