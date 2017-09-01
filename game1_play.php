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
									<div id="start" class="start-title center-align">
										<h3 id="startitle" class="red-text text-darken-3">When you feel ready press next to start the time !!</h3>
									</div>

									<div id="end" class="end-title center-align" style="display:none">
										<button id="start-button" class="btn btn-game side-padding">Go to Next Level !</button>
									</div>

									<img id="image" class="image-responsive imgartifact">
								</div>
							</div>

							<div class="namefillarea">
								<h5 class="text-area" style="">My name is </h5> 
								<input id="text" type="text" style="display:none">							
							</div>

							<div class="navigation">
								<div class="pull-left">
									<a id="hint-button" style="display:none" class="btn btn-game side-padding">Hint !</a>
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
	<script src="js/main.js"></script>
	<script>
		startGame("/gardiner/data/quizData.json", 1);
	</script>	
</body>
</html>