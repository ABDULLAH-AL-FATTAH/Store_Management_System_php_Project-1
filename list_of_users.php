
<?php 
	
	//php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
	
	require('connection.php');

        
      
 ?>

  <!-----------------------------Task:4.1 php to mysql database connection php segment End ----------------------------------------->				

	<!---------------------php to mysql database connection end------------------->


<!DOCTYPE html>

<html>
	<head>
		<title>List of Users</title>
	</head>
	<body>
			<!-----------------------------Task:4.2 Now we are going to show the Information of the database ----------------------->	
		<?php
			//here we use php mysql Database 'SELECT Data'> Example(MySQLi Object-Oriented) link: https://www.w3schools.com/php/php_mysql_select.asp (follow the link to understand)
			

			$sql="SELECT * FROM users";

			$query = $conn->query($sql);

			echo "<table border='1'>
                <tr><th>User First Name</th><th>User Last Name</th><th>User E-mail</th><th>Action</th></tr>";

			while ( $data = mysqli_fetch_assoc($query)) {
				 
				 $user_id	                    = $data['user_id'];
				 $user_first_name	            = $data['user_first_name'];
				 $user_last_name                = $data['user_last_name'];
				 $user_email                    = $data['user_email'];
				

				 echo "<tr>
				 			<td>$user_first_name</td>
                            <td>$user_last_name</td>
				 			<td>$user_email</td>
				 			<td><a href='edit_user.php?id=$user_id'>Edit</a></td>
				 	  </tr>"; 
				 	  //here we've created one more coloum as Edit and linking it's associative php file that edit_category.php
			}

			echo "</table>";
		?>
	</body>



</html>