
<header class="main-header">  
	<div class="main-header-inner container">
		<div class="col-md-3 col-xs-3">
			<a href="/gardiner" class="logo">
		      GARDINER
		    </a>
	    </div>
		<div class="col-md-9 col-xs-9">
			<nav class="navbar navbar-static-top">     
			  <div class="navbar-custom-menu pull-right">
			    <ul class="nav navbar-nav">	
			    <?php 
						$basename = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF']))-4);
						if ($basename == 'game2') { 
					?>
					<li id="time-block">
						<a class="level" data-toggle="control-sidebar">
							<i class="fa fa-clock-o"></i>
							<span>Time: </span>
							<div class="result">
							<p id="clock" class="timer"></p>
							</div>
				    	</a>
				  </li>
					<li>
						<a class="level" data-toggle="control-sidebar">
							<i class="fa fa-level-up"></i>
							<span>Level: </span>
							<div class="result">
							<p class="level-num"></p>
							</div>
				    	</a>
				  </li>
				  <li>
						<a class="category" data-toggle="control-sidebar">
							<i class="fa fa-tags"></i>
							<span>Category: </span>
							<div class="cat-result">
							<p class="category-num"></p>
							</div>
						</a>
				  </li>
			    <li>
						<a class="score" data-toggle="control-sidebar">
							<i class="fa fa-star-o"></i>
							<span>Score: </span>
							<div class="result">
							<p id="score-counter" class="counter">0</p>
							</div>
						</a>
				  </li>












					<?php } else if ($basename == 'game1_play') { ?>	  
					<li>
						<a class="hints" data-toggle="control-sidebar">
							<i class="fa  fa-question-circle"></i>
							<span>Hints: </span>
							<div class="result">
							<p id="hintsused" class="timer"></p>
							</div>
				    	</a>
					</li>
					<li>
						<a class="level" data-toggle="control-sidebar">
							<i class="fa fa-clock-o"></i>
							<span>Time: </span>
							<div class="result">
							<p id="seconds" class="timer"></p>
							</div>
				    	</a>
					</li>
					<li>
						<a class="level" data-toggle="control-sidebar">
							<i class="fa fa-level-up"></i>
							<span>Level: </span>
							<div class="result">
							<p id="levelid" class="level-num"></p>
							</div>
				    	</a>
				  </li>
			    <li>
						<a class="score" data-toggle="control-sidebar">
							<i class="fa fa-star-o"></i>
							<span>Score: </span>
							<div class="result">
							<p id="score-counter" class="counter">0</p>
							</div>
						</a>
				  </li>
					<?php } ?>
			    <li>
						<a href="home.php" data-toggle="control-sidebar"><i class="fa fa-home"></i></a>
					</li>			      
					<li class="flags-menu">
			      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="" class="flag flag-us"> 
								<i class="fa fa-angle-down"></i>
							</a>
			        <ul class="dropdown-menu dropdown-flags-list">					
								<li class="active">
									<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-us"> English (US)</a>
								</li>						
								<li>
									<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-gr"> Ελληνικά</a>
								</li>
							</ul>					
					</li>
					<?php if( $user->is_logged_in() ){ ?>			      
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="images/user.svg" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="images/user.svg" class="img-circle" alt="User Image">		              
								<p><?php echo $_SESSION['username']; ?></p>
							</li>              
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="memberpage.php" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
			    </li>
			    <!-- Control Sidebar Toggle Button -->
			    <?php } else {?>  
					<li>
						<a class="login" href="login.php" data-toggle="control-sidebar">
							<i class="fa fa-sign-in"></i>
							<span>Login</span>
						</a>
					</li> 
					<?php }?>      
				</ul>
			</div>
			</nav>
		</div>
	</div>	
</header>