<!-----------------------------Task:4.3 Editing functions ----------------------->





<?php 
    
  



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
			
			
		?>


        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="edit_category.php" method="GET">
			Category :<br>
			<input type="text" name="category_name" value="<?php echo category_name"><br><br>
			Category Entry Date : <br>
			<input type="date" name="category_entrydate"><br><br>
			<input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>