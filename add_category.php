<!-----------------------php to mysql database connection start------------------>


<!---এই পিএইচপি অংশটুকু বিভিন্ন পেইজে না দিয়ে একটি নির্দষ্ট পেইজে রেখে ঐ পেইজের লিঙ্ক করে দিলে এই অংশের সুবিধা পেয়ে যাবো, তাই ঐ পেজের নাম দিবো 'connection.php' -


                    <?php
                    	$hostname ='localhost';
                    	$username ='root';
                    	$password =''; // password is empty for local server //if you are using xampp then password is empty.
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


-----------------------------------------উপরের এই পুরো  <?php.....?>    অংশটুকু কমেন্টে রেখে দিবো  -------------------->

<!------------------------php to mysql database connection end------------------->

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');




 ?>



<!DOCTYPE html>

<html>
	<head>
		<title>Add Category</title>
	</head>
	<body>





        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['category_name']))
			{
    			$category_name	= $_GET['category_name'];
    			$category_entrydate = $_GET['category_entrydate'];

			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "INSERT INTO category (category_name, category_entrydate) VALUES ('$category_name', '$category_entrydate')";
			//Now we have create some quories using php's OOP method follow this: 

    				if ($conn->query($sql) === TRUE)
                        {
    					  echo 'Data Inserted!';
    					} 
                    else 
                        {
    					  echo 'Data Not Inserted';
    					}

			}
		?>


        <!-- Task-2 database table insert by OOP and SQL insert start----------------->



        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="add_category.php" method="GET">
			Category :<br>
			<input type="text" name="category_name"><br><br>
			Category Entry Date : <br>
			<input type="date" name="category_entrydate"><br><br>
			<input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>