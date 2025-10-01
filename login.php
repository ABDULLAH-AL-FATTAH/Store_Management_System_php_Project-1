<?php 
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    require('connection.php');
    session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->
		<?php
			if(isset($_POST['user_email']))
			{
    			
    			$user_email       = $_POST['user_email'];
    			$user_password   = $_POST['user_password'];
    			
			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password' ";
                 //Now we have create some quories using php's OOP method follow this:			 
                $query = $conn->query($sql);

                if(mysqli_num_rows($query) > 0)
                     {
                        $data = mysqli_fetch_assoc($query);

                        $user_first_name = $data['user_first_name'];
                        $user_last_name = $data['user_last_name'];


                        $_SESSION['user_first_name'] = $user_first_name;
                        $_SESSION['user_last_name'] = $user_last_name;

                        header('location: index.php');
                     } 
                else 
                     {
    				    echo 'Login Failed. Invalid user email or password.';
                     }
            }
		?>
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			

			User's E-mail:<br> 
			<input type="email" name="user_email"><br><br>

			User's Password:<br> 
			<input type="password" name="user_password"><br><br>
			
            <input type="submit" value="login">
            
            
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>