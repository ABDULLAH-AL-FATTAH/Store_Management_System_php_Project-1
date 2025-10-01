

<?php
//session : login-logout system এর জন্য session start করতে হবে। part-1 Start
    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

     if(! empty($user_first_name) && ! empty($user_last_name) ){
    
//session: login-logout system এর জন্য session start করতে হবে। part-1 end
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | ZHSWMCH</title>
</head>
<body>
    <h1>Store Operation Scheme</h1>
    <h3><a href="logout.php">Logout</a></h3>
</body>
</html>

<?php
//session : login-logout system এর জন্য session start করতে হবে। part-2 Start
	 }
	 else{
	   header('location: login.php');
	 }

//session : login-logout system এর জন্য session start করতে হবে। part-2 end
 ?>
