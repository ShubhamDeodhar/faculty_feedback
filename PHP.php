<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "","sw_p_login") or die('Error connecting to database'); 

	$user=$_POST['Reg_no'];
	$pass=$_POST['password'];

	$sql="SELECT id FROM student_login WHERE reg_no='$user' and pass='$pass'";
	

	$query= mysqli_query($conn,$sql) or die('Error firing the query');
	$num= mysqli_num_rows($query);

	if( $num==1){
		$_SESSION['login_user']=$user;

		$check_log="SELECT check_log FROM student_login WHERE reg_no='$user' and pass='$pass'";
		$query= mysqli_query($conn,$check_log) or die('Error firing the query');
		$row = $query->fetch_assoc();
		$fname = "SELECT fname,section FROM student_login WHERE reg_no='$user' and pass='$pass'";
		$query = mysqli_query($conn,$fname) or die('!');
		$n = $query->fetch_assoc();

		$_SESSION['name']=$n["fname"];
		$_SESSION['class']=$n["section"];
		if($row["check_log"] == 1){ 
		
		header("location:H_Try1.php");
		}
		else{
			header("location:change.html");
		}

	}else{
		$error= "Your username or password is wrong!";
		echo $error;
	}	

?>