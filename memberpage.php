<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php');
require('layout/nav.php'); 
$user_session_id=$_SESSION['memberID'];	
		
$smtp = $db->prepare("SELECT * FROM `members` WHERE `memberID`=$user_session_id");						
$smtp->execute();
$row1 = $smtp->fetch();
$is_admin=$row1['is_admin']; 
$show_admin = ($is_admin==1) ? '':'`user_id`=' . $user_session_id . ' AND'; 
$show_user = ($is_admin==1) ? 'INNER JOIN `members` ON `game_sessions`.`user_id` =  `members`.`memberID`':'';  
$show_user_selection = ($is_admin==1) ? ',`members`.`USR_FName`,`members`.`USR_LName`':'';
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
					<div class="table-wrapper">						
						<?php								
						$result = $db->prepare("SELECT `game_sessions`.*, `artifact_types`.`art_type`,`levels`.`difficulty_characterization` $show_user_selection 
												FROM `game_sessions` 
												INNER JOIN `artifact_types` 
												ON `game_sessions`.`game_category` =  `artifact_types`.`art_id` 
												INNER JOIN `levels` 
												ON `game_sessions`.`game_level` =  `levels`.`id`
												$show_user
												WHERE $show_admin `game_sessions`.`game_id`=1");
												
						$result->execute();
						$number_of_rows = $result->rowCount();
						$user_th = ($is_admin==1) ? '<th>User</th>':'';						
						if($number_of_rows>0  ){
						?>
						<table id="game1-table" class="table table-hover normaltopmargin table-striped table-bordered">
							<caption class="text-center">Logs History</caption>
							<thead>
								<tr>
								<th>#</th>
								<?php echo $user_th; ?>
								<th>Date</th>
								<th>Level</th>
								<th>Category</th>
								<th>Clicks</th>
								<th>Moves</th>
								<th>Time (sec)</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								for($i=0; $row = $result->fetch(); $i++){ 
								$_SESSION['is_admin'] = $row['is_admin'];								
								$user_td = ($is_admin==1) ? '<td>'.$row['USR_FName'] . ' ' . $row['USR_LName'] .'</td>':'';
							?>
								<tr>
								<td><?php echo $i+1; ?></td>
								<?php echo $user_td; ?>
								<td><?php echo $row['start_datetime']; ?></td>
								<td><?php echo $row['difficulty_characterization']; ?></td>
								<td><?php echo $row['art_type']; ?></td>
								<td><?php echo $row['game_clicks']; ?></td>
								<td><?php echo $row['game_moves']; ?></td>
								<td><?php echo $row['game_time_finished']; ?></td>
								</tr>
								<?php } ?>
							<?php }else{ ?>
							<p class="text-center">Logs Not found</p>
							<?php } ?>
							</tbody>								
						</table>
					</div><!--end of .table-responsive-->
				</div>
				<div id="game2" class="tab-pane fade">
					<h3 class="text-center">Game 2 Logs</h3>
					<div class="table-wrapper">						
						<?php 		
						$result = $db->prepare("SELECT `game_sessions`.*, `artifact_types`.`art_type`,`levels`.`difficulty_characterization` $show_user_selection 
												FROM `game_sessions` 
												INNER JOIN `artifact_types` 
												ON `game_sessions`.`game_category` =  `artifact_types`.`art_id` 
												INNER JOIN `levels` 
												ON `game_sessions`.`game_level` =  `levels`.`id`
												$show_user
												WHERE $show_admin `game_sessions`.`game_id`=2");
												
						$result->execute();
						$number_of_rows = $result->rowCount();
						if($number_of_rows>0  ){
						?>
						<table id="game2-table" class="table table-hover normaltopmargin table-striped table-bordered">
							<caption class="text-center">Logs History</caption>
							<thead>
								<tr>
								<th>#</th>
								<?php echo $user_th; ?>
								<th>Date</th>
								<th>Level</th>
								<th>Category</th>
								<th>Clicks</th>
								<th>Moves</th>
								<th>Time (sec)</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								for($i=0; $row = $result->fetch(); $i++){ 
								$user_td2 = ($is_admin==1) ? '<td>'.$row['USR_FName'] . ' ' . $row['USR_LName'] .'</td>':'';
							?>
								<tr>
								<td><?php echo $i+1; ?></td>
								<?php echo $user_td2; ?>
								<td><?php echo $row['start_datetime']; ?></td>
								<td><?php echo $row['difficulty_characterization']; ?></td>
								<td><?php echo $row['art_type']; ?></td>
								<td><?php echo $row['game_clicks']; ?></td>
								<td><?php echo $row['game_moves']; ?></td>
								<td><?php echo $row['game_time_finished']; ?></td>
								</tr>
								<?php } ?>
							<?php }else{ ?>
							<p class="text-center">Logs Not found</p>
							<?php } ?>
							</tbody>								
						</table>
					</div><!--end of .table-responsive-->
				</div>		
			</div>
		</div>		
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
