<html>
<head>
<title>ChatBot</title>
<style>
	*{
		dmargin-left: 13%;
	}
	body{
		background: url(bg/bg.jpg);
	}
table{
width:35%;
}
.user{
background-color:black;
color:white;
text-align:right;
border-radius:25px;
padding:20px;
width:50%;
}
.bot{
background-color:gray;
text-color:black;
text-align:left;
border-radius:25px;
padding:20px;
width:50%;
}
input[type=text] {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
input[type=submit]{
padding:20px;
background-color:#0080ff;
color:white;
text-align:center;
border-radius:8px;
font-size:16px;
width=15%
}
</style>
</head>
<body>
<form action="chatbot2.php" method="POST">
<input type="text" name="t1" placeholder="Write your message here..." required width=40%>
<input type="submit" class="abc" value="Send" name="b1" width=10%>
</form>
<table width=50%>
</table>

</body></center>


</html>

<?php
$conn=mysqli_connect("localhost","root","","fportal");
if($conn->connect_error){

	die('Connection Failed :'.$conn->connect_error);
}
else
{

if(isset($_POST['t1'])&&isset($_POST['b1']))
{
$umsg=$_POST['t1'];
$q = "INSERT INTO chats(msg,sender) VALUES ('$umsg','user')";
mysqli_query($conn,$q);
}
$ugach="select msg from chats where id=(select max(id) from chats)";
$ugachach= mysqli_query($conn,$ugach);
$u2=mysqli_fetch_row($ugachach);


$q7="select Ans from qa where Ques like '{$u2[0]}%'";
$s1=mysqli_query($conn,$q7);
if(mysqli_num_rows($s1)>0)
{
if($row1=mysqli_fetch_row($s1))
{
//echo ("<tr><td class='bot'>$row1[0]</td><td></td></tr>");
$w2="insert into chats(msg,sender) values ('$row1[0]','bot')";
mysqli_query($conn,$w2);
}
}
else if(mysqli_num_rows($s1)==0&& isset($_POST['b1']))
{
$ra=mt_rand(0,3);
if($ra==0)
{
$xv="insert into chats(msg,sender) values ('Whats that?','bot')";
mysqli_query($conn,$xv);
}
else if($ra==1)
{
$xv="insert into chats(msg,sender) values ('I didnt get you.','bot')";
mysqli_query($conn,$xv);
}
else if($ra==2)
{
$xv="insert into chats(msg,sender) values ('Can you elaborate it.','bot')";
mysqli_query($conn,$xv);
}
else if($ra==3)
{
$xv="insert into chats(msg,sender) values ('I have never heard of it before.','bot')";
mysqli_query($conn,$xv);
}



}

$w1="select id from chats";
$e1=mysqli_query($conn,$w1);
if(mysqli_num_rows($e1)>0)
{
while($n1=mysqli_fetch_row($e1))
{
$gh="select msg from chats where id='$n1[0]'";
$g1=mysqli_query($conn,$gh);
$g2=mysqli_fetch_row($g1);
$knm="select sender from chats where id='$n1[0]'";
$qq=mysqli_query($conn,$knm);
$q5=mysqli_fetch_row($qq);
if($q5[0]=='bot'){

echo "<table><tr><td class='bot'>$g2[0]</td><td></td></tr></table>";

}
else if($q5[0]=='user'){

echo "<table><tr><td></td><td class='user'>$g2[0]</td></tr></table>";
}
}
}

}



?>