<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/font-awesome-5.8.1.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <title>Forms in Bootstrap4</title>
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
</head>
<body>
       <?php 
		if(isset($_COOKIE['success']))
		{
			echo "<p>".$_COOKIE['success']."</p>";
		}
       ?>

       <?php 
		if(isset($_POST['addemp']))
		{
			//4
			$ename=$_POST['ename'];
            $mob=$_POST['mobile'];
			$sal=$_POST['salary'];
            $dept=$_POST['dept'];
			$city=$_POST['city'];
			
			//6 insert data
			mysqli_query($con,"insert into employee(ename,mobile,salary,dept,city) values('$ename','$mob',$sal,'$dept','$city')");
			
            echo mysqli_error($con);
       
	        if(mysqli_affected_rows($con)>0)
	        {
	         setcookie("success","Thanks We will get back you soon",time()+2);
	         header("Location:add_employee.php");
	        }
	        else
	        {
	        echo"Sorry! Unable to process your request";
	        }
	   }
	   ?>
	  

<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">CRUD using PHP and MySQL</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container mt-5">
        <!--########################START HERE#########################-->

        <!-- FORM -->
        <form method="POST" action="" onsubmit="return validate()">
            <div class="form-group">
                <label for="name">Employee Name : </label>
                <input class="form-control" type="text" name="ename" id="ename" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="email">Employee Mobile : </label>
                <input class="form-control" type="number" name="mobile" id="mobile" placeholder="Enter Mobile">
            </div>

            <div class="form-group">
                <label for="password">Employee Salary : </label>
                <input class="form-control" type="number" name="salary" id="salary" placeholder="Enter Salary">
            </div>

            <div class="form-group">
                <label for="dept">Employee Dept.:</label>
                <select class="form-control" name="dept" id="dept">
                  	<option value="">--Select Deportment--</option>
					<option value="Developer">Developer</option>
					<option value="Designer">Designer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Employee City : </label>
                <input class="form-control" type="text" name="city" id="city" placeholder="Enter City">
            </div>
  
            <button type="submit" name="addemp" class="btn btn-primary">Add</button>
            <a href="view_employee.php" role="button" name="view" class="btn btn-primary">View</a>
            
        </form>

        <br><br>

    </div><!-- ./container -->
    <div style="margin-top:500px;"></div>

<!-- BODY ENDS -->

<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/mdb.min.js"></script>
</body>
</html>
