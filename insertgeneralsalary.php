<?php
session_start();
 

if(!(isset($_SESSION['name'])) )
{
header ("Location: index.php");

}
error_reporting(0);
$connection = mysql_connect("localhost", "root", ""); 
if(!$connection) 
{
die("Connection failed " . mysql_error());
}
$db_conn = mysql_select_db("hms", $connection);
if(!$db_conn)
{
die("Connection failed " . mysql_error());
}


$query = "SELECT * FROM salary_generaldetails";

$db_result = mysql_query($query,$connection);


?>























<!doctype html>
<html>
<head>
<title> Insert General Salary Details</title>
<link rel="stylesheet" type="text/css" href="style1.css">

</head>


<body>

<div class="header">
<h1>Welcome Admin</h1>
 <?php echo date(" j/m/y h:iA "); 
  ?>  
</div>
<a style="float:right;color:red;" value="LOG OUT" href="index.php">LOG OUT</a>
<div class="nav">
<center><h1>
  <a href="insertemp.html">Insert employee</a><br><br>
  <a href="deleteemp1.php">Delete employee</a><br><br>
  <a href="selectemp.html">Select employee</a><br><br>
  <a href="updateemp.php">Update employee</a><br><br>
  <a href="insertsalary.php">Salary</a><br><br>
  <a href="updatesalary.php">Update Salary</a><br><br>
  

</h1>
 </center>
</div>

<div class="section">
<center><h1>LIST OF ALL EMPLOYEES</h1><br><br><br>
 </center>
 <table border="1" style= "background-color: #DAD4E9; color: #000000; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Tax (%)</th><br />
          <th>Salary for Full time emp (per hour)</th><br />
          <th>Salary for Part time emp (per hour)</th><br />
          <th>Bonus</th><br />
          
          <th>Currency </th><br />
        </tr>
      </thead>
      <tbody>

        <?php
          while( $row = mysql_fetch_array($db_result)){
            echo
            "<tr>
             <td>{$row['tax']}</td> 
              <td>{$row['salary_perhour_ft']}</td>
			  <td>{$row['salary_perhour_pt']}</td>
       	      <td>{$row['bonus']}</td>
       	      <td><b>Euro</b></td>

            </tr>\n";
          }
        ?>
      </tbody>

    </table>


<BR>


<center>

<table>
<tr>
<td>
<h1>UPDATE EXISTING DETAILS</h1>

<form action="insertgeneralsalary2.php" method="post" onSubmit="return confirm('Are you sure to continue?')">
   <table border="1">
   
      <tr>
   <td>
	Enter salary for <b>full time</b> employees (per hour)

   </td>

   <td>

	<input type="number" name="ft"  >

   </td>

   </tr>

   <tr>
   <td>
	Enter salary for <b>part time</b> employees (per hour)
   </td>

   <td>
	<input type="number" name="pt"  >
	    
  </td>

   </tr>
<tr>
   <td>
	Enter Tax (%)
   </td>

   <td>
	<input type="number" name="tax"  >
   </td>

   </tr>
      
   <tr>
   <td>
	 Enter bonus  
   </td>

   <td>
	<input type="number" name="bonus"  >
	    
  </td>

   </tr>

   </table>
      <button type="submit" >INSERT SALARY</button>
      </form>    


</td>

<td>
&emsp;&emsp;&emsp;&emsp;
</td>



</tr>

</table>


 

		
</center>




<?php

a:

mysql_close($connection);

?>   

 
      
</div>

 
</body>
</html>
