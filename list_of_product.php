		<!-----------------------------Task:4 To show the information from database Start------------------------------------------>
    
    <!---এখন আমাদের ডাটাবেজে ID Automatic পাবে, কারন আমরা auto increment দিয়েছি তাই, তবে Category_name বা Category_Entrydate ইনপুট করার পর ভুল হতে পারে। তাই আমরা database থেকে correction না করে সরাসরি system থেকে correction করবো, system থেকে correction করার আগে আমাদেরকে এই database এর তথ্য  গুলোকে show করাতে হবে। এবং সেই show কৃত তথ্য গুলোকে আমরা click করে edit page যাবো এবং সেখান থেকে তত্থগুক্লোকে correction করে নিবো । তাই আমাদের data গুলো show করাতে একটি নতুন page create করতে হবে। এই page এর নাম দিবো আমরা 'list_of_category.php'. এই লিখাগুলো list_of_category.php শুরুতে আছে। -->

    <!-- এই page এ 'add_category.php' এর কোডগুলো কপি করে এখানে পেষ্ট করি ---> 



  <!-----------------------php to mysql database connection start------------------>


  			<!---এই অংশের কোড 'connection.php' ফাইলে সংযুক্ত আছে। নিচের php তে --->




<!-----------------------php to mysql database connection start------------------>

<!-----------------------------Task:4.1 php to mysql database connection php segment start ------------------------------------------>
<?php 
	
	//php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
	
	require('connection.php');




 ?>

  <!-----------------------------Task:4.1 php to mysql database connection php segment End ----------------------------------------->				

	<!---------------------php to mysql database connection end------------------->


<!DOCTYPE html>

<html>
	<head>
		<title>List of Category</title>
	</head>
	<body>
			<!-----------------------------Task:4.2 Now we are going to show the Information of the database ----------------------->	
		<?php
			//here we use php mysql Database 'SELECT Data'> Example(MySQLi Object-Oriented) link: https://www.w3schools.com/php/php_mysql_select.asp (follow the link to understand)
			

			$sql="SELECT * FROM Category";

			$query = $conn->query($sql);

			echo "<table border='1'><tr><th>Category</th><th>Data</th><th>Action</th></tr>";

			while ( $data = mysqli_fetch_assoc($query)) {
				 
				 $category_id	=$data['category_id'];
				 $category_name = $data['category_name'];
				 $category_entrydate = $data['category_entrydate'];

				 echo "<tr>
				 			<td>$category_name</td>
				 			<td>$category_entrydate</td>
				 			<td><a href='edit_category.php?id=$category_id'>Edit</a></td>
				 	  </tr>"; 
				 	  //here we've created one more coloum as Edit and linking it's associative php file that edit_category.php
			}

			echo "</table>";
		?>
	</body>



</html>