<?php
  	
		 $pw = $_POST["pw"];
	$oldpw = $_POST["oldpw"];
   $valid = true;
	if( strlen($pw) < 6 || strlen($pw) > 20 ) {
			 $valid=false;
 			goto x;
		}
 
	if( !preg_match("#[0-9]+#", $pw) ) {
   $valid=false;			
			goto x;
		}
   if(empty($_POST["pw"]) || empty($_POST["oldpw"]))
    {
        $valid=false;
         
        goto x;
    }
     
	$querypw = mysql_query("SELECT password FROM logindetails");
	$resultpw = mysql_fetch_array($querypw);
	$pw1 = $resultpw['password'];    
   if($pw1!=$oldpw)
   {
   	goto x;
   } 
    
	if(!empty($pw))
	{
	 
   mysql_query("UPDATE logindetails SET password='".$pw."'");
   
	}
  x:
  if( strlen($pw) < 6 || strlen($pw) > 20)  
  {
			echo '<h2>Password need to have between 6 and 20 characters, must have one special character.</h2><br>';
			 
			 
 			goto y;
		}
		if( !preg_match("#[0-9]+#", $pw) ) {
			echo'<h2>Password must include at least one number!<br></h2>';
			goto y;
		}
 
 if(empty($_POST["pw"])|| empty($_POST["oldpw"])){
        $valid=false;
         echo "<h1>Some details not provided. Please enter details again. <br></h1>";
        goto y;
    }
    if($pw1!=$oldpw)
   {
   	echo "<h1>Old password is incorrect! Try again. </h1>";
   	goto y;
   	
   }  
  y:
  mysql_close($connection);
?>