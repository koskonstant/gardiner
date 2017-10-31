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
		                	<p class="intro">In the “Face Name game”, the player is invited to remember and write down the name of the people depicted in the section. The game starts with the presentation of the faces with their names respectively. The user can control the game pagination, so she/he can take her/his time to observe each face with its name and she/he could have the opportunity to remember the matches while playing the level.</p>
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
