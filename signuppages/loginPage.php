<?php
$conn =mysqli_connect('localhost','root','','project') or die("Unable to connect");

session_start();

if(isset($_POST['login'])) 	
{
	$user=$_POST['username'];
	$password=$_POST['password'];
      
   		$query = "SELECT * FROM farmer WHERE contact='$user' AND pass= '$password'";
  		 $result = mysqli_query($conn,$query);
       $query1 = "SELECT * FROM transport WHERE contact='$user' AND pass= '$password'";
       $result1 = mysqli_query($conn,$query1);
         $query2 = "SELECT * FROM user WHERE contact='$user' AND pass= '$password'";
       $result2 = mysqli_query($conn,$query2);

        		if (mysqli_num_rows($result) > 0) 
        			{
            			echo "<center>Farmer Login Verified. Redirecting..!!</center>";
            			
                  $_SESSION['username']= $user;
                  header("Location:../index.php");

        			}elseif (mysqli_num_rows($result1) > 0) 
        			{
            			echo "<center>Transport Login Verified. Redirecting..!!</center>";
            		

        			}elseif (mysqli_num_rows($result2)>0) 
        			{
            			echo "<center>Uer Login Verified. Redirecting..!!</center>";
            			
        			} 			
       			 else 
       				 {
            			echo '<script type="text/javascript">  alert("Enter Valid Crediantials ") </script>';
        			}




}

?>

<!DOCTYPE html>
<html>
<head>
  <title>LoginPage</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
      <div class="SignIn">
      	<form method="post" action="loginPage.php">
        	<img src="bg/icon.jpeg" class="profileicon">
          		<h1> Login Here </h1>
      	 <div class="form">
        		    <p>Username <input type="text" name="username" placeholder="Enter Contact No."></p>
            		<p>Password <input type="Password" name="password" placeholder="Password"></p>
       	</div>
     				 <input type="submit" name="login" value="Log In" class="button"><br>
      	 <button class="butto"> forgot password ? </button>
     
      <div class="butt">
      	<a href="../otp/index1.php"> Create New Account </a>
      </div>
  </form>
      </div>   
</body>
</html>