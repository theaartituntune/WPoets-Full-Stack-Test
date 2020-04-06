<?php 
//3
include("connect.php");
?>
<html>
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/font-awesome-5.8.1.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <title>Tables & Pagination in Bootstrap4</title>
    <style>
        .table{
            box-shadow: 0 0 5px black;
        }
    </style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <a class="navbar-brand" href="#">View All Employees</a>
        </nav>
		<ul class="menu mt-4">
	        <a href="add_employee.php" role="button" class="btn btn-primary">Add Employee</a>
			<a href="view_employee.php" role="button" class="btn btn-primary">View Employees</a>
		</ul>
		<?php 
		if(isset($_COOKIE['success']))
		{
			echo "<p>".$_COOKIE['success']."</p>";
		}
		if(isset($_COOKIE['error']))
		{
			echo "<p>".$_COOKIE['error']."</p>";
		}
		?>
		
		<?php 
		$res=mysqli_query($con,"select *from employee");
		if(mysqli_num_rows($res)>0)
		{
			?>
			<table class="table text-center text-uppercase table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Employee Mobile</th>
                    <th>Employee Salary</th>
                    <th>Employee Dept.</th>
				    <th>Employee City</th>
					<th></th>
					<th></th>
					
				</tr>
            </thead>
			<?php 
			while($row=mysqli_fetch_assoc($res))
			{
				?>
				<tbody>
				<tr>
				<th scope="row"><?php echo $row['id'];?></th>
				<td><?php echo $row['ename'];?></td>
				<td><?php echo $row['mobile'];?></td>
				<td><?php echo $row['dept'];?></td>
				<td><?php echo $row['salary'];?></td>
				<td><?php echo $row['city'];?></td>
				
				
				<td><a href="edit_employee.php?id=<?php echo $row['id'];?>" role="button" class="btn btn-primary">Edit</a></td>
				<td><a href="delete_employee.php?id=<?php echo $row['id'];?>" role="button" class="btn btn-primary">Delete</a></td>
			</tr>
            </tbody> 
				<?php
			}
			?>
		</table>
			<?php
		}
		else
		{
			echo "<p>Sorry! No Records Found</p>";
		}
		?>
		
         <script src="bootstrap/js/jquery-3.3.1.min.js"></script>
         <script src="bootstrap/js/popper.min.js"></script>
         <script src="bootstrap/js/bootstrap.min.js"></script>
         <script src="bootstrap/js/mdb.min.js"></script>
	</body>
</html>