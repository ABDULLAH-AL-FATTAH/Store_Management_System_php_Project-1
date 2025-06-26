
<!-----------------------php to mysql database connection start------------------>
<?php
	$hostname ='localhost';
	$username ='root';
	$password ='';
	$dbname	  ='store_db';

	
	//Comments: if connection error then it shows 'connection faild' otherwise okay
	//this code segment is 'MySQLi Object Oriented' for understand go to https://www.w3schools.com/php/php_mysql_connect.asp

	//creat connection
	$conn=new mysqli ($hostname, $username, $password, $dbname);
	//check connection
	if($conn->connect_error)
	{
		die("Not Connected: " . $conn->connect_error);
	}
	
?>

<!------------------------php to mysql database connection end------------------->





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>