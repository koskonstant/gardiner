
<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Game 2';

//include header template
require('layout/header.php'); 
require('layout/nav.php');
?>

<div class="container">
	    <div class="col-md-12">
			<section>
        <div class="text-center">
          <div class="editContent">
              <h2>Matching Tiles</h2>		                    
          </div>
          <div class="wrapper">	
						<div class="table">
							<div class="col-md-12 ">
								<div id="my-memory-game"></div>									
							</div>                								
						</div>
					</div>
        </div>
		  </section>
		</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
<script src="js/classList.js"></script>
<script src="js/memory.js"></script>
<script>
  (function(){
    var myMem = new Memory({
      wrapperID : "my-memory-game",
      onGameStart : function() { return false; },
      onGameEnd : function() { return false; }
    });
  })();
</script>

