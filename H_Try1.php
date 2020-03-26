<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="H_style1.css" rel="stylesheet"/>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

</head>
<body>
     <div id="head">
        <p>Student-Faculty Interface</p>
        <div class="dropdown" id="btn">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Options available on this page
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#head">about this page</a><br><hr/>
              <a class="dropdown-item" href="#two"> Find your Faculties</a><br/><hr/>
              <a class="dropdown-item" href="#">Rate Your Faculty</a>
            </div>
          </div>
    </div>
    <div id="about">
        <p id="l1"><u> Welcome, <?php echo $_SESSION['name']; ?><!--our php goes here (we will use fname)--></u></p><br><br><br>
        <p id="l2">This website will help you to know your faculty so that you can have better interaction with them.</p><br>
        <p id="l3">You can find all required information about your faculties through this page. Also you can rate them in accordance with your 
          experience </p>

    </div>
    <div id="req">
        <p><u>I hope that you would find this interface system useful......</u></p>
    </div>
    <div id="two">
        <div id="c2">
          <p>lets find your Faculties</p >
        </div>
        <div id="c3">
          <p>It seems that you belong to <?php echo $_SESSION['class']?><!--our php goes here (we will use sectio here) --> section</p>
        </div>
        <div id="FA">So your faculty-Advisor is:
            <?php 
                    $y=$_SESSION['class'];
                  	$conn = mysqli_connect("localhost", "root", "","sw_p_login") or die('Error connecting to database'); 
                    $teach="SELECT F_name FROM faculty_advisor WHERE Section='$y'";
                    $query= mysqli_query($conn,$teach) or die('Error firing the query');
                    $row=$query->fetch_assoc();
                    $_SESSION['FA_name']=$row['F_name'];
                    echo $_SESSION['FA_name'];
             ?> 
        </div>
         <div id="Other">
           <p>For Other Faculties, feel free to search</P>
           <form action="#" method=POST id="find">
              <h3>Enter faculty-id</h3>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input"placeholder="Faculty-id
                " aria-describedby="inputGroup-sizing-sm">
              </div>
              <h2>-------------------------OR------------------------</h2>
              <h3>Enter Faculty Name</h3>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input"placeholder="Faculty-id
                " aria-describedby="inputGroup-sizing-sm">
              </div>
              <button type="submit" id="btn2" class="btn btn-success">Success</button>

           </form>
         </div>

    </div>
    <div id='three'>
      <div id="title">
        <p>Faculty Leaderboard ........just for Fun</p>
      </div>
    </div>
</body>
</html>