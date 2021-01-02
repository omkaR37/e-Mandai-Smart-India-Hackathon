<?php
    require 'php/fconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Farmer Detail Page</title>
	<link rel="stylesheet" type="text/css" href="signup2.css">
    
<script type="text/javascript">
        function PreviewImage() {
             var oFReader = new fileReader();
             oFReader.readAsDataURL(document.getElementById("file").files[0]);

             oFReader.onload = function (oFREvent){
                document.getElementByClassName("photobox").src = oFREvent.target.result;
             };
        };
    </script>

</head>
<body>
    <form method="post" action="farmersignup.php" enctype="multipart/form-data">
	<div id="login-box">
            <div class="photobox">
                			
                			<input type="file" name="file" id="file" onchange="PreviewImage();">   
     			  
     	 	</div>
 
        <div class="left-box">
           	<h1>Farmer  Insert Information </h1>
                <input type="text" name="fname" placeholder="First Name" required="First name" /> 
                <input type="text" name="lname" placeholder="Last Name" required="Last name" /> 
                <input type="date" name="dob" placeholder="Birth-Date" required="bday" />


                <input type="text" name="contact" placeholder="Contact No" required="contact" />
                <input type="text" name="altcontact" placeholder="Alternate contact No"/>

                <input type="text" name="address" placeholder="At/Po.-" required="address" />
                <input type="text" name="pincode" placeholder="Pincode" required="pincode" />
                
                <input type="text" name="aadhar" placeholder="Adhar No." required="Aadhar no" />
            	<input type="text" name="faddress" placeholder="Enter the Farm Address"  />
				<input type="text" name="fpin" placeholder="Farm Pincode"  />
                

           		<input type="Password" name="password" placeholder="Enter Password" required="Password" />
                <input type="Password" name="cpassword" placeholder="Re-Enter Password" required="Passwords" />

                <input type="submit" name="signupbutton"  value="submit">

          </div> 

</div>
   </form>      
</body>
</html>
