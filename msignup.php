<html>
  <head>
     <title>Registration</title>
	 <style>
body {background-image:url("signup.jpg");background-size:cover;}
</style>

     
 


<script type="text/javascript">
 function func()
{
	var fn=document.getElementById("fn").value;
	var ln=document.getElementById("ln").value;
	 var e=document.getElementById("eid1").value;
	 var p=document.getElementById("pw1").value;
	 var r=document.getElementById("rc").value;
	 var u=document.getElementById("uname").value;
	 var flag=0,flag1=0,flag2=0,i;
	 for(i=0;i<fn.length;i++)
	 {
	 if(fn.charCodeAt(i)>=48&&fn.charCodeAt(i)<=57)
	 {
	 flag=1;
	 break;
	 }
	 }
	 for(i=0;i<ln.length;i++)
	 {
	 if(ln.charCodeAt(i)>=48&&ln.charCodeAt(i)<=57)
	 {
	 flag1=1;
	 break;
	 }
	 }
	 for(i=0;i<u.length;i++)
	 {
	 if(u.charCodeAt(i)>=48&&u.charCodeAt(i)<=57)
	 {
	 flag2=1;
	 break;
	 }
	 }
	 if(flag==1)
	 {
	 alert("First Name cannot have numbers");
	 return false;
	 }
	 if(flag1==1)
	 {
	 alert("Last Name cannot have numbers");
	 return false;
	}
	if(flag2==1)
	{
	 alert("Username cannot have numbers");
	 return false;
	}
    if(p==""||p==null||p.length<6)
      {
        alert("Enter a valid password of length 6");	    
	    return false;
	  }
	if(r!=p)
	  {
		alert("confirm password should be same");	    
	    return false;
	  }
	   if((e.indexOf("@"))<=0||(e.indexOf("."))<=0)
	    {
		  alert("Enter a valid email address");
		  return false;
	    }
		if(((e.lastIndexOf("."))-(e.lastIndexOf("@")))<=1)
		{
		  alert("Enter a valid email address");
		  return false;
		  }
		  if((e.lastIndexOf("."))==((e.length)-1))
		  {
		  alert("Enter a valid email address");
		  return false;
		  }
	    }
		
	   

</script>

 </head>
  
  
  <body onsubmit="return func()"> 



<?php 

$servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name= "mayb";

$db_host="localhost";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if(!$con) 
{
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

	session_start();
	
	//session_destroy(); 
	
	if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname'])&&
	isset($_POST['pass'])&& isset($_POST['gender'])&& isset($_POST['email']))
	 {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname =$_POST['uname'];
		$pass =$_POST['pass'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password_confirm = $_POST['password_confirm'];
		
		
			$sql = "SELECT email FROM mumbai WHERE email='$email'";
			$query_run=$con->query($sql);
			if($query_run->num_rows == 0)
			{
		           
				$query = "INSERT INTO mumbai VALUES ('$fname','$lname','$uname','$pass','$gender','$email')";
				if($query_run =$con->query($query)) 
				{ 
				echo '<h2><centre> Registration Succesful , Login to start </center> </h2>';
				header("location:mlogin.php");
				} 			
				else 
				{ 
				echo '<h2> Couldn\'t Register :( </h2>'; 
				} 
			}
			else 
			{
				echo '<h2> Email Id already registered. </h2>';
			}
	   }
	?>  
	
	
	<center> 
     <h1>Signup</h1>
     <form method="post">
         
             
             First Name : 
             <input type="text" name="fname" id="fn" size="40" required/> *
             <br><br>
              
             Last Name : 
             <input type="text" name="lname" id="ln" size="40" required/> *
             <br><br>

             Username : 
             <input type="text" name="uname" id="uname" size="40" required/> * 
             <br><br>

             Password : 
             <input type="password" name="pass" id="pw1" size="40" required/> *
             <br><br>
             
			 
			 Confirm Password : 
            <input type="password" name="password_confirm" id="rc" size="40" required/> *
             <br><br>

		     Gender : *
             <input type="radio" name="gender" value="male" required>Male</input>
             <input type="radio" name="gender" value="female">Female</input>
             <br><br>

			 
			 
             Email : 
             <input type="text" name="email" id="eid1" size="40" required/> *
             <br><br>
	            
	         <input type="submit" value="Submit"/><br>
	
	        </form>
	    </center>
    </body>
</html>
