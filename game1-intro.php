<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Gardiner - Face Name Game';

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
		                    <h2>Face Name Game</h2>		                   
		                </div>
		                <div class="introduction">
		                	<p class="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ex quis rutrum mattis. Pellentesque nec odio tellus. Nam sed nisl in lectus malesuada hendrerit. Etiam ut urna in neque maximus tristique. Suspendisse egestas molestie magna nec laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
		                </div>
                      <div class="col-md-3 marginauto">
                        <h3 class="mg__start-screen--sub-heading">Select Level</h3>
						<form action="game1.php" method="post">
                        <select name="difficulty-levels" id="difficulty-levels">
                          <option value="1" selected>Level 1 - ( 5 Faces )</option>
                          <option value="2">Level 2 - ( 10 Faces )</option>
                          <option value="3">Level 3 - ( 15 Faces )</option>
                        </select>
                        <div class="marginauto normaltopmargin">
                         <button id="btn" class="btn btn-game marginauto">Get Started</button>
                        </div>
						</form>
                    </div>
                    <div class="clear"></div>                   
		            </div>
		        </div>
		    </section>
		</div>
	</div>
</div>

<?php require('layout/footer.php'); ?>
