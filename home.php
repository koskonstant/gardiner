<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Home';

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
		                </div>
		                <div class="editContent">
		                    <h1>Select game to start</h1>
		                </div>
		                <div class="grid">
							<figure class="effect-oscar col-md-4">
								<img src="images/game1.jpg" alt="Face Name Game"/>
								<figcaption>
									<h2>Face Name Game</h2>
									<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
									<a href="game1-intro.php">Lets' Play</a>
								</figcaption>			
							</figure>
							<figure class="effect-oscar col-md-4">
								<img src="images/game2.jpg" alt="Matching Tiles Game"/>
								<figcaption>
									<h2>Matching Tiles Game</h2>
									<p>Flip the tiles and try to match them up in pairs.</p>
									<a href="game2.php">Lets' Play</a>
								</figcaption>			
							</figure>
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
