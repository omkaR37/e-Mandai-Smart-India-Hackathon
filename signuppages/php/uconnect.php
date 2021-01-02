<?php
$conn =mysqli_connect('localhost','root','','project') or die("Unable to connect");
	
 if(isset($_POST['signupbutton'])) {

		//echo '<script type="text/javascript">  alert("signup button pressed") </script>' ;
   			 

        $password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$contact=$_POST['contact'];

		echo $password;
		echo $cpassword;

	$query="select * from user where contact='$contact'";
	$query_run=mysqli_query($conn,$query);

	$query1="select * from farmer where contact='$contact'";
	$query_run1=mysqli_query($conn,$query);


	if(mysqli_num_rows($query_run)>0 || mysqli_num_rows($query_run1)>0)	
	{
		echo '<script type="text/javascript">  alert(" Contact No already Exist ") </script>' ;
		
	}
	elseif($password == $cpassword)
	{
		 //echo '<script type="text/javascript">  alert("password and confrim password match") </script>' ;

		$fname =$_POST['fname'];
		$lname =$_POST['lname'];
		$dob =$_POST['dob'];
		$address =$_POST['address'];
		$pin =$_POST['pincode'];
		$altcontact =$_POST['altcontact'];
		$aadhar =$_POST['aadhar'];
		
		 $files = $_FILES['file'];
                 
                    
                  
                  $filename = $files['name'];                 
                  $filetmp = $files['tmp_name'];                   
                  $fileext = explode('.',$filename);
                  $filecheck = strtolower(end($fileext));
                  $fileextstored = array('png','jpg','jpeg');

                  if(in_array($filecheck,$fileextstored))
                  	{
                  		$destinationfile = 'upload/'.$filename;
                  		move_uploaded_file($filetmp,$destinationfile);

                  		$q ="insert into user(fname,lname,photo,dob,contact,altcontact,address,pin,aadhar,pass) values('$fname','$lname','$filename	','$dob','$contact','$altcontact','$address','$pin','$aadhar','$password')";


                 	   $query = mysqli_query($conn,$q);
	                     	if($query)
    	                 	{ sleep(0.4);
        	             		echo '<script type="text/javascript">  alert(" You are registered !!") </script>' ;

                     			
							}else{
									echo '<script type="text/javascript">  alert(" Error..!!") </script>' ;	
							}

                     
                    }else{  
                    			//echo '<script type="text/javascript">  alert(" DESSSSSS") </script>' ;
                    	$q ="insert into user(fname,lname,dob,contact,altcontact,address,pin,aadhar,pass) values('$fname','$lname','$dob','$contact','$altcontact','$address','$pin','$aadhar','$password')";
                    			$query = mysqli_query($conn,$q);
                    				if($query)
    	                 	{
    	                 		sleep(0.4);
        	             		echo '<script type="text/javascript">  alert(" You are registered !!") </script>' ;
        	             	
                   
							}else{
									echo '<script type="text/javascript">  alert(" Error..!!") </script>' ;	
							}
                    	}
		 
	}else{
		echo '<script type="text/javascript">  alert("Password and Confrim Password not match") </script>' ;

	}
}












?>






	