<?php 

$con = mysqli_connect("localhost", "root", "");

$db_name = mysqli_query($con, "SHOW DATABASES");

function fetch_db_table($database)
{
	$con = mysqli_connect("localhost", "root", "", "$database");
	$db_table = mysqli_query($con, "SHOW TABLES");
	$output = "";
	$output .='
		<ul class="list-unstyled">
	';
	while ($row = mysqli_fetch_array($db_table))
	{
		$output .='
			<li><a href="fetch.php?table='.$row[0].'&database='.$database.'">'.$row[0].'</li>
		';
	}
	$output .='
					</ul>
			';
			return $output;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>	
	
</head>
<body>

	<div class="container">
		<br><br><br>
		<table class="table table-bordered">
			<tr>
				<td>Database Name</td>
				<td>Database Table</td>
			</tr>
			<?php 

			while ($row = mysqli_fetch_array($db_name))
			{
				echo '
					<tr>
							<td><a href="index.php?database='.$row["Database"].'">'.$row["Database"].'</a></td>
							<td>'.fetch_db_table($row["Database"]).'</td>
					</tr>
				';	
			}


			 ?>
		</table>
	</div>


</body>
</html>

</a>




<script type="text/javascript">

	$(document).ready(function(){
		
	});

</script>


