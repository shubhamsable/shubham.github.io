<style>
	h2{color:blue;}
</style>
<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name= "logreg";

$db_host="localhost";

$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
echo "Connected successfully";
}


	session_start();
	if(isset($_POST['uname']) && isset($_POST['pw']) )
	{
		echo("hello1");
		$uname = $_POST['uname'];
		$pw= $_POST['pw'];
		//$password_hash = md5($password);
		
		$sql= "SELECT uname,pw from info WHERE uname='$uname' AND pw='$pw'";
        $query_run=$conn->query($sql);
		
		if($query_run->num_rows == 0)
		{
		 echo("welcome");
           echo '<h2> Invalid Email-Password Combination</h2>';
		}
		
		
    else
  {
	echo '<h2> logged in</h2>';

   }		
		echo("welcome");
		}
		
		
    else{
		
	
		echo("welcome");
		
	}
		
		
   
		
	
	
	
?>

	

<html> <head><style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
<style type="text/css">
.my_content_container a {
    border-bottom: 1px solid #777777;
    border-left: 1px solid #000000;
    border-right: 1px solid #333333;
    border-top: 1px solid #000000;
    color: #000000;
    display: block;
    height: 2.5em;
    padding: 0 1em;
    width: 5em;       
    text-decoration: none;       
}
</style>
 </head>
 <body>
 <div class="my_content_container">
    <a href=homepage.html>homepage</a>
</div>
 <h1>LOGIN</h1> 
<form action="" method="post"> 
User Name: <input type="text" name="uname"><br> 
Password: <input type="password" name="pw"><br> 
<input type="Submit"> </form> </body> </html>