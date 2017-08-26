<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Game 1';

//include header template
require('layout/header.php'); 
require('layout/nav.php');
?>


<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-md-12">
			<section>
		        <div class="overlay">
		            <div class="container text-center">
		                <div class="editContent">
		                    <h2>Memory Fun</h2>		                   
		                </div>
		                <div class="introduction">
		                	<p class="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ex quis rutrum mattis. Pellentesque nec odio tellus. Nam sed nisl in lectus malesuada hendrerit. Etiam ut urna in neque maximus tristique. Suspendisse egestas molestie magna nec laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
		                </div>
		                <div class="pull-right">
	                        <a href="game1.php" class="btn btn-game side-padding">Get Started</a>
	                    </div>
		            </div>
		        </div>
		    </section>
		</div>
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
