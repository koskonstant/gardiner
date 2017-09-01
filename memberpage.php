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
		<div class="clear"></div>
		<div class="container normaltopmargin">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#game1">Game 1 Logs</a></li>
				<li><a data-toggle="tab" href="#game2">Game 2 Logs</a></li>
			</ul>

			<div class="tab-content">
				<div id="game1" class="tab-pane fade in active">
					<h3 class="text-center">Game 1 Logs</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
						<caption class="text-center">Logs History</caption>
						<thead>
							<tr>
							<th>Date</th>
							<th>Level</th>
							<th>Category</th>
							<th>Clicks</th>
							<th>Moves</th>
							<th>Time (sec)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<td>19/05/2017</td>
							<td>1</td>
							<td>Fruits</td>
							<td>tile1 (Orange): 2 Clicks  tile2 (Orange): 2 Clicks  tile3 (Melon): 1 Clicks  tile4 (Apricot): 1 Clicks  tile5 (Pear): 2 Clicks  tile6 (Melon): 1 Clicks  tile7 (Pear): 2 Clicks  tile8 (Apricot): 1 Clicks </td>
							<td>12</td>
							<td>12</td>
							</tr>
							<tr>
							<td>19/05/2017</td>
							<td>2</td>
							<td>Colors</td>
							<td>37.3</td>
							<td>12</td>
							<td>50</td>
							</tr>
							<tr>
							<td>19/05/2017</td>
							<td>3</td>
							<td>Fruits</td>
							<td>43.2</td>
							<td>12</td>
							<td>70</td>
							</tr>
							<tr>
							<td>19/05/2017</td>
							<td>1</td>
							<td>Colors</td>
							<td>39.1</td>
							<td>12</td>
							<td>30</td>
							</tr>
							<tr>
							<td>19/05/2017</td>
							<td>2</td>
							<td>Faces</td>
							<td>38.4</td>
							<td>12</td>
							<td>40</td>
							</tr>
							<tr>
							<td>19/05/2017</td>
							<td>3</td>
							<td>Fruits</td>
							<td>41.1</td>
							<td>12</td>
							<td>55</td>
							</tr>
						</tbody>								
						</table>
					</div><!--end of .table-responsive-->
				</div>
				<div id="game2" class="tab-pane fade">
				<h3>Game 2 Logs</h3>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>		
			</div>
		</div>		
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
