<?php
$EmpId=$_POST['EmpId'];
 
 $valid = true;
if(empty($_POST['EmpId'])){
        $valid=false;
         
        goto a;
    }
 
if(!empty($EmpId))
{
	
$query = "SELECT * FROM employee_salary WHERE emp_id = ".$EmpId;
	
$db_result = mysql_query($query,$connection);

$querysal = mysql_query("SELECT sum(SALARY) AS sumsal FROM employee_salary WHERE emp_id = '".$EmpId."'");
$rowsal = mysql_fetch_array($querysal);


 
}

 



a:

if(empty($_POST['EmpId'])){
        $valid=false;
         
        goto b;
    }
if (mysql_num_rows($db_result) > 0) {
   
} else {
	echo "<h1>";
	echo "Nothing is selected OR Value does not exist. <br>Try again.<br>";
	 
    	echo "</h1>";
	goto b;
}
 
  while( $row = mysql_fetch_array($db_result)){
            echo
            "<tr>
             <td>{$row['emp_id']}</td> 
             <td>{$row['month']}</td>
				 <td>{$row['year']}</td>
 				 <td> {$row['salary']} </td>
           
			   </tr>\n";
          } 
 b:
 
?>