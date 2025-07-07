

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');
 ?>



<!DOCTYPE html>

<html>
	<head>
		<title>Add Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['product_name']))
			{
    			$product_name	    = $_GET['product_name'];
    			$product_category   = $_GET['product_category'];
    			$product_code       = $_GET['product_code'];
    			$product_entry_date = $_GET['product_entry_date'];

			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "INSERT INTO product (product_name, product_category, product_code, product_entry_date) 
                        VALUES ('$product_name', '$product_category', '$product_code', '$product_entry_date')";
			//Now we have create some quories using php's OOP method follow this: 

    				if ($conn->query($sql) == TRUE)
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

<!-- category তে entry করা data গুলো এখানে list আকারে দেখানোর জন্য নিচের কোডটি ব্যবহার করা হয়েছে।  -->
 <?php
    $sql = "SELECT * FROM category";
    $query = $conn->query($sql);
 ?>


        
<!-----------------------------Task:1  form for input data start-------------------------------------------->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			Product :<br>
			<input type="text" name="product_name"><br><br>

			Product Category:<br>
            <select name="product_category">
                <?php
                    while ($data = mysqli_fetch_array($query))
                        {
                                $category_id = $data['category_id'];
                                $category_name = $data['category_name'];
                        
                            echo"<option value='$category_id'>$category_name</option>";
                        }
                ?>
                
                

            </select><br><br>
			
			Product code:<br> 
			<input type="text" name="product_code"><br><br>
			Product Entry Date : <br>
			<input type="date" name="product_entry_date"><br><br>

            <input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>