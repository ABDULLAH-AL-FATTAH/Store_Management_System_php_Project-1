<!-----------------------------Task:4.3 Editing functions ----------------------->





<?php 
// Task:1 Edit Category Page
// This page is used to edit the category information in the database.
	require('connection.php');

 ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Edit Category</title>
	</head>
	<body>


		<?php

			if (isset($_GET['id'])) {

				$getid = $_GET['id'];

				$sql = "SELECT *FROM category WHERE category_id = $getid";

				$query   = $conn->query($sql);

				$data = mysqli_fetch_assoc($query);



				$category_id	=$data['category_id'];
				$category_name = $data['category_name'];
				$category_entrydate = $data['category_entrydate'];
			}

			if (isset($_GET['category_name'])) 
			{
				$new_category_name = $_GET['category_name'];
				$new_category_entrydate = $_GET['category_entrydate'];
				$new_category_id = $_GET['category_id'];

				// Update the category information in the database
				$sql = "UPDATE category SET category_name='$new_category_name', category_entrydate='$new_category_entrydate' WHERE category_id=$new_category_id";

				if ($conn->query($sql) === TRUE) {
				echo 'Data Updated Successfully!';
				} else {
				echo 'Data Not Updated';
				}
   }
			
			
		?>


        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="edit_category.php" method="GET">
			Category :<br>
			<input type="text" name="category_name" value="<?php echo $category_name ?>"><br><br>
			Category Entry Date : <br>
			<input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>"><br><br>
			<input type="text" name="category_id" value="<?php echo $category_id ?>" hidden>
			<input type="submit" value="update">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>