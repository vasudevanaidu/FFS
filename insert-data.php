<?php
// config.php file is included to create database connection.
include 'config.php';
session_start();
// if statement to determine if the form has been submitted using the form name.
if(isset($_POST['submit']))
{
	// assigning values form the form to the variables.
	$q1= $_POST['r1'];
	$q2= $_POST['r2'];
	$q3= $_POST['r3'];
	$q4= $_POST['r4'];
	$q5= $_POST['r5'];
	$q6= $_POST['r6'];
	$q7= $_POST['r7'];
	$mail=$_SESSION['Email'];
	
	// Query to insert values into the table.
	$sql="insert into feedback_results(Email,q1,q2,q3,q4,q5,q6,q7) values('$mail','$q1','$q2',
	'$q3','$q4','$q5','$q6','$q7')";
	$select="select * from feedback_results where Email='$mail'";

	$query=mysqli_query($con,$select);

	// restricting the duplication of email 
	if(mysqli_num_rows($query)>0)
	{
		echo "<script>alert('!Feedback already submitted')</script>";
		echo "<script>window.open('dashboard.php','_self')</script>";
	}
	//  if the query executed successfully then 
	else if(mysqli_query($con,$sql))
	{
		// alerting a message.
		echo "<script>alert('Feedback submitted Successfuly')</script>";	
		// redirecting to the login page .
		echo "<script>window.open('dashboard.php','_self')</script>";
	}
	// if the query fails
	else
	{
		// displaying an error message.
		echo "error:Failed to connect";
	}
}



?>