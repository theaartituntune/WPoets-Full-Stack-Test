<?php 
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	include("connect.php");
	$res=mysqli_query($con,"select *from employee where id=$id");
	if(mysqli_num_rows($res)==1)
	{
		$row=mysqli_fetch_assoc($res);
	}
	else
	{
		exit("Wrong Window");
	}
	?>
	<?php 
//5

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
          <a class="navbar-brand" href="#">Edit Employee Details</a>
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
		if(isset($_POST['updateemp']))
		{
			//4
			$ename=$_POST['ename'];
			$mob=$_POST['mobile'];
			$sal=$_POST['salary'];
			$dept=$_POST['dept'];
			$city=$_POST['city'];
			//6 update data
			mysqli_query($con,"update employee set ename='$ename',
			city='$city',
			salary=$sal,
			dept='$dept',
			mobile='$mob' where id=$id");
			
			if(mysqli_affected_rows($con)>0)
			{
				setcookie("success","Employee Updated successfully",time()+2);
				header("Location:view_employee.php");
			}
			else
			{
				setcookie("error","Sorry! try Again",time()+2);
				header("Location:view_employee.php");
			}
		}
		?>
		<div class="container mt-5">
		<form method="POST" action="" onsubmit="return validate()">
		    <div class="form-group">
                <label for="name">Employee Name : </label>
                <input class="form-control" type="text" name="ename" id="ename"value="<?php echo $row['ename'];?>">
            </div>
			
			<div class="form-group">
                <label for="email">Employee Mobile : </label>
                <input class="form-control" type="number" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>">
            </div>
			
            <div class="form-group">
                <label for="password">Employee Salary : </label>
                <input class="form-control" type="number" name="salary" id="salary" value="<?php echo $row['salary'];?>">
            </div>
					
			<div class="form-group">
                <label for="dept">Employee Dept.:</label>
                <select class="form-control" name="dept" id="dept">
                  	<option value="">--Select Deportment--</option>
					<option <?php if($row['dept']=="Developer") echo "selected";?> value="Developer">Developer</option>
					<option <?php if($row['dept']=="Designer") echo "selected";?> value="Designer">Designer</option>
                </select>
            </div>		
				
			<div class="form-group">
                <label for="name">Employee City : </label>
                <input class="form-control" type="text" name="city" id="city" value="<?php echo $row['city'];?>">
            </div>	
					
		    <input type="submit" name="updateemp" role="button" class="btn btn-primary" value="Update"></td>
				
		</form>
		
		<script>
			function validate()
			{
				if(document.getElementById("ename").value=="")
				{
					alert("Enter Employee Name");
					return false;
				}
				if(document.getElementById("salary").value=="")
				{
					alert("Enter Salary");
					return false;
				}
				else
				{
					var sal=document.getElementById("salary").value;
					if(isNaN(sal))
					{
						alert("Enter salary in digits");
						return false;
					}
				}
			}
		</script>
		<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/mdb.min.js"></script>
		
	</body>
</html>
	<?php
	
}
else
{
	exit("Wrong Wiondow");
}
?>