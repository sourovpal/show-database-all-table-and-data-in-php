<?php 



function fetch_table_clounn_name()
{
	$database = $_GET['database'];

	$con = mysqli_connect("localhost", "root", "", "$database");

	$db_table = mysqli_query($con, "SELECT * FROM ".$_GET['table']."");

	$output = "";

	$i = 0;
	while ($row = mysqli_fetch_array($db_table))
	{
		// if($i == 0)
		// {
		$array = array_keys($row);
			foreach ($array as $key => $value)
			{
				if(is_string($value))
				{
					$output .='<th>'.str_replace('_', " ", ucfirst($value)).'</th>';
				}
			}

		// }
		// $i++;
			break;

	}
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
<br><br><br>
	<div class="container">
		<table class="table table-bordered text-center table-sm">
			<thead class="table-secondary">
			<tr>
				<?php 
				echo fetch_table_clounn_name();
				 ?>
			</tr>
			</thead>
			<tbody>
				<?php 
					$output ="";
					if(isset($_GET['table']))
					{


						$database = $_GET['database'];

						$con = mysqli_connect("localhost", "root", "", "$database");

						$db_table = mysqli_query($con, "SELECT * FROM ".$_GET['table']."");

				while ($row = mysqli_fetch_array($db_table))
				{
					$output .= '<tr>';
					foreach ($row as $key => $value)
					{
						if(is_string($key))
						{
							echo '<td>'.$value.'</td>';
						}
					}

					$output .= '</tr>';
					echo $output;
				}
			}

				 ?>
		</tbody>
		</table>

	</div>


</body>
</html>






<script type="text/javascript">

	$(document).ready(function(){
		
	});

</script>


