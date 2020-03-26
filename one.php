<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "","sw_p_login") or die('Error connecting to database'); 
    $reg=$_POST['reg_no'];
    $p1=$_POST['new_p'];
    $p2=$_POST['new_pr'];
    $sql="SELECT id FROM student_login WHERE reg_no='$reg ' ";
    $query= mysqli_query($conn,$sql) or die('Error firing the query');
    if($p1!=$p2){
        $error="Password not Confirmed";
    echo $error;
    }
    else{
        $_SESSION['login_user']=$reg;
        $change="UPDATE student_login 
        SET pass='$p2', check_log=1
        WHERE reg_no='$reg'";
        if($conn->query($change)== TRUE){
            header("location:H_try.php");
        }
        else{
            echo "Error updaing records:";
        }
    }
   
?>
 