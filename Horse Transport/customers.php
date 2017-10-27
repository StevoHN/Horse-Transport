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
		<h1 class="text-center">Customers:</h1>
		<?php

			include "include/openConn.php";

			try
			{
				$query = "SELECT customers.customerId, customers.firstName, customers.lastName, customers.email, customers.phone, customers.address, ranks.rankName
				FROM customers
				INNER JOIN ranks ON customers.rankId = ranks.rankId;";

				$runQ = $conn->prepare($query);
				$runQ->execute();

				$r = $runQ->fetchAll();
				$rows = $runQ->rowCount();
				?>
			<table class="table">
				<thead>
					<tr>
						<th>Customer ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
				for($i=0;$i<$rows;$i++)
				{
					$customerId = $r[$i][0];
					$customerFN = $r[$i][1];
					$customerLN = $r[$i][2];
					$customerEmail = $r[$i][3];
					$customerPhone = $r[$i][4];
					$customerAddress = $r[$i][5];
					$customerRank = $r[$i][6];
					?>
				<tr>
					<td><?php echo $customerId ?></td>
					<td><?php echo "<strong>" . $customerFN . "</strong> " . $customerLN ?></td>
					<td><?php echo $customerEmail ?></td>
					<td><?php echo $customerPhone ?></td>
					<td><?php echo $customerAddress ?></td>
					<td><?php echo $customerRank ?></td>
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