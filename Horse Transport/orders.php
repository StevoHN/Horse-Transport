<?php
session_start();

include "include/isUserLoggedIn.php";
include "include/isAdmin.php";

?>
<!DOCTYPE html>

<html>

	<head>
		<?php include "include/head.php" ?>
	</head>
	
	<body>
	<?php include "include/navbar.php" ?>
		
		<div class="container">
		<h1 class="text-center">Orders:</h1>
		<?php

			include "include/openConn.php";

			try
			{
				$query = "SELECT orders.orderId, customers.firstName, customers.lastName, orders.horseCount, orders.locationFrom, orders.locationTo, orders.date, orders.comment, customers.email, customers.phone
				FROM orders
				INNER JOIN customers ON orders.customerId = customers.customerId;";

				$runQ = $conn->prepare($query);
				$runQ->execute();

				$r = $runQ->fetchAll();
				$rows = $runQ->rowCount();
				?>
			<table class="table">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Customer Name</th>
						<th>Horse Count</th>
						<th>From</th>
						<th>To</th>
						<th>Desired Date</th>
						<th>Comment</th>
						<th>Email</th>
						<th>Phone</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for($i=0;$i<$rows;$i++)
				{
					$orderId = $r[$i][0];
					$customerFN = $r[$i][1];
					$customerLN = $r[$i][2];
					$horseCount = $r[$i][3];
					$locationFrom = $r[$i][4];
					$locationTo = $r[$i][5];
					$orderDate = $r[$i][6];
					$orderComment = $r[$i][7];
					$customerEmail = $r[$i][8];
					$customerPhone = $r[$i][9];
					?>
				<tr>
					<td><?php echo $orderId ?></td>
					<td><?php echo "<strong>" . $customerFN . "</strong> " . $customerLN ?></td>
					<td><?php echo $horseCount ?></td>
					<td><?php echo $locationFrom ?></td>
					<td><?php echo $locationTo ?></td>
					<td><?php echo $orderDate ?></td>
					<td><?php echo $orderComment ?></td>
					<td><?php echo $customerEmail ?></td>
					<td><?php echo $customerPhone ?></td>
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