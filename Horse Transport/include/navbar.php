<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapseNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Michael Hembo</a>
		</div>
		
		<div class="collapse navbar-collapse" id="collapseNavbar">
			<ul class="nav navbar-nav">
				<?php $path = "/Horse Transport" ?>
				<li class="<?php if($_SERVER['PHP_SELF'] == "$path/about.php"){echo "active";}?>"><a href="#">About</a></li>
				<li class="<?php if($_SERVER['PHP_SELF'] == "$path/order.php"){echo "active";}?>"><a href="order.php">Order</a></li>
				<li class="<?php if($_SERVER['PHP_SELF'] == "$path/pricing.php"){echo "active";}?>"><a href="#">Pricing</a></li>
				<li class="<?php if($_SERVER['PHP_SELF'] == "$path/faq.php"){echo "active";}?>"><a href="#">FAQ</a></li>
				<li class="<?php if($_SERVER['PHP_SELF'] == "$path/support.php"){echo "active";}?>"><a href="#">Support</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				
				<?php
				if($_SESSION['userLoggedIn'])
				{
				?>
					<li class="<?php if($_SERVER['PHP_SELF'] == "$path/register.php"){echo "active";}?>"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				<?php
				}
				else
				{?>
					<li class="<?php if($_SERVER['PHP_SELF'] == "$path/register.php"){echo "active";}?>"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					<li class="<?php if($_SERVER['PHP_SELF'] == "$path/login.php"){echo "active";}?>"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</nav>
