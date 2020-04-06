<?php 
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	include("connect.php");
	mysqli_query($con,"delete from employee where id=$id");
	if(mysqli_affected_rows($con)>0)
	{
		setcookie("success","Employee Deleted successfully",time()+2);
		header("Location:view_employee.php");
	}
	else
	{
		setcookie("error","Sorry! Unable to Delete,try Again",time()+2);
		header("Location:view_employee.php");
	}
}
else
{
	exit();
}
 ?>