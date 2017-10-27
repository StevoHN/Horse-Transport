<?php
session_start();

include "include/isUserLoggedIn.php";

?>
<!DOCTYPE html>

<html>

	<head>
		<?php include "include/head.php" ?>
	</head>
	
	<body>
	<?php include "include/navbar.php" ?>
		
		<div class="container">
		<h1 class="text-center">My Orders:</h1>
		<?php

			include "include/openConn.php";

			try
			{
				$customerId = $_SESSION['userId'];
				$query = "SELECT orders.orderId, orders.horseCount, orders.locationFrom, orders.locationTo, orders.date, orders.comment, customers.firstName, customers.lastName, customers.email, customers.phone FROM orders INNER JOIN customers ON orders.customerId = customers.customerId WHERE customers.customerId = $customerId;";

				$runQ = $conn->prepare($query);
				$runQ->execute();

				$r = $runQ->fetchAll();
				$rows = $runQ->rowCount();
				?>
			<table class="table">
				<thead>
					<tr>
						<th>Order Id</th>
						<th># of Horses</th>
						<th>From</th>
						<th>To</th>
						<th>Date</th>
						<th>Comment</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for($i=0;$i<$rows;$i++)
				{
					$orderId = $r[$i][0];
					$horseCount = $r[$i][1];
					$locationFrom = $r[$i][2];
					$locationTo = $r[$i][3];
					$orderDate = $r[$i][4];
					$orderComment = $r[$i][5];
					//$customerName = $r[$i][6] . " " . $r[$i][7];
					//$customerEmail = $r[$i][8];
					//$customerPhone = $r[$i][9];
					?>
				<tr>
					<td><?php echo $orderId ?></td>
					<td><?php echo $horseCount ?></td>
					<td><?php echo $locationFrom ?></td>
					<td><?php echo $locationTo ?></td>
					<td><?php echo $orderDate ?></td>
					<td><?php echo $orderComment ?></td>
				</tr>
					<?php
				}
			}
			catch(PDOException $err)
			{
				echo $err;
			}

					?>
				</tbody>
			</table>
		</div>
	<?php include "include/jsFiles.php" ?>
	</body>

</html>