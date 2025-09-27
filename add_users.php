

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');


?>



<!DOCTYPE html>

<html>
	<head>
		<title>Add Users</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['user_first_name']))
			{
    			$user_fisrt_name    = $_GET['user_first_name'];
    			$user_last_name   = $_GET['user_last_name'];
    			$user_email       = $_GET['user_email'];
    			$user_password   = $_GET['user_password'];
    			
    			

			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) 
                        VALUES ('$user_fisrt_name', '$user_last_name', '$user_email', '$user_password')";
			//Now we have create some quories using php's OOP method follow this: 

    				if ($conn->query($sql) == TRUE)
                        {
    					  echo 'Data Inserted!';
    					} 
                    else 
                        {
    					  echo 'Data Not Inserted!';
    					}

			}
		?>



        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			
			
			
			User's First Name:<br> 
			<input type="text" name="user_first_name"><br><br>

			User's Last Name:<br> 
			<input type="text" name="user_last_name"><br><br>

			User's E-mail:<br> 
			<input type="email" name="user_email"><br><br>

			User's Password:<br> 
			<input type="password" name="user_password"><br><br>
			
            <input type="submit" value="submit">
            
            <input type="reset" value="reset">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>