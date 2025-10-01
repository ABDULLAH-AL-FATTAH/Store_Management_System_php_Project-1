

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');


    //session : login-logout system এর জন্য session start করতে হবে। part-1 Start
    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

     if(! empty($user_first_name) && ! empty($user_last_name) ){
    
//session: login-logout system এর জন্য session start করতে হবে। part-1 end

?>



<!DOCTYPE html>

<html>
	<head>
		<title>Edit Users</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['id'])){
                $getid  =   $_GET['id'];

                $sql = "SELECT *FROM users WHERE user_id  = $getid";

				$query   = $conn->query($sql);

				$data = mysqli_fetch_assoc($query);

				 $user_id	                    = $data['user_id'];
				 $user_first_name	            = $data['user_first_name'];
				 $user_last_name                = $data['user_last_name'];
				 $user_email                    = $data['user_email'];
				 $user_password                 = $data['user_password'];
				 

            }

            if(isset($_GET['user_first_name']))
                {

                    $new_user_first_name              = $_GET['user_first_name'];
                    $new_user_last_name               = $_GET['user_last_name'];               
                    $user_email                       = $_GET['user_email'];
                    $user_password                    = $_GET['user_password'];
                    $user_id                          = $_GET['user_id'];

                $sql1 = "UPDATE users SET  user_first_name='$new_user_first_name', 
                                            user_last_name='$new_user_last_name',
                                            user_email='$user_email',
                                            user_password='$user_password'
                  WHERE user_id=$user_id";


                // $query1 = $conn->query($sql1);

                if($conn->query($sql1)==TRUE){
                    echo 'Data Updated Successfully!';
                }
                else{
                    echo "Error updating record: " . $conn->error;               
                }
            }


		?>



        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			
			
			User's First Name:<br> 
			<input type="text" name="user_first_name" value="<?php echo $user_first_name ?>"><br><br>

			User's Last Name:<br> 
			<input type="text" name="user_last_name" value="<?php echo $user_last_name ?>"><br><br>

			User's E-mail:<br> 
			<input type="email" name="user_email" value="<?php echo $user_email ?>"><br><br>

			User's Password:<br> 
			<input type="password" name="user_password" value="<?php echo $user_password ?>"><br><br>

            <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden> <br><br>
			
            <input type="submit" value="submit">
            
          



		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>


<?php
//session : login-logout system এর জন্য session start করতে হবে। part-2 Start
	 }
	 else{
	   header('location: login.php');
	 }

//session : login-logout system এর জন্য session start করতে হবে। part-2 end
 ?>