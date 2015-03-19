<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../homepage.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#li2").addClass("active");
	});
	</script>
</head>

<body>

	<?php
	require_once './adminHeader.php';
	?>

	<div class="container">

		<div class="starter-template">
			<h1>Manage Group</h1>
		</div>
		<div style="max-width: 50%; margin: 0 auto">
			<table class="table">
				<tr>
					<th>GroupId</th>
					<th>Name</th>
					<th>Description</th>
					<th>Students</th>
				</tr>
				<?php
				require_once '../model/Group.php';
				require_once '../model/Student.php';
				$result = selectGroup();
				while($row=mysqli_fetch_row($result)){
					$res = selectByGroupId($row[0]);
					$temp = "";
					while($row1 = mysqli_fetch_row($res)){
						$temp.=$row1[2];
						$temp.=",";
					}
					$temp = substr($temp,0, strlen($temp)-1);
					echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$temp</td>
					</tr>";
				}
				?>

			</table>
			<a style="float:right;font-size:1.5em" href="./addGroup.php">Add a Group</a>
			<a style="float:right;font-size:1.5em;margin-right:50px;" href="./allocateGroup.php">Allocate report to a Group</a>
		</div>
	</div>
	<!-- /.container -->



</body>
</html>
