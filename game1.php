<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Game 1';

//include header template
require('layout/header.php');
require('layout/nav.php'); 


//style="overflow: hidden" (line for disable scroll)
?>

<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-md-12">
		    <section>
	            <div class="container text-center">
					<div class="memory-item" align="center">
						<div class="image-container z-depth-3">						
							<div class="imgcont">
								<div>
									<h3 id="level" class="red-text text-darken-3" >Memorize the name of each face<span id="levelid"></span></h3>
								</div>

								<div id="start" class="start-title center-align">
									<h3 id="startitle" class="red-text text-darken-3">Memorize the name of each face</h3>
								</div>

								<div id="end" class="end-title center-align" style="display:none">
									<a href="game1_play.php" id="start-button" class="btn btn-game side-padding">Start the Game !</a>
								</div>

								<img id="image" class="image-responsive imgartifact">
							</div>
						</div>

						<div class="textcont">
							<h5 id="text" class="text-area" style="display:none">My name is <span id="name"></span></h5>
							<audio id="audioNameEngine"></audio>
							<audio id="audioEngine"></audio>
						</div>

						<div class="navigation">
							<div class="pull-left">
								<a id="previous" style="display:none" class="btn btn-game side-padding">Previous</a>
							</div>
							<div class="pull-right">
								<a id="next" class="btn btn-game side-padding">Next</a>
							</div>
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
	<script>
		loadFaces("/gardiner/data/quizData.json",level) ;
	</script>	

</body>
</html>