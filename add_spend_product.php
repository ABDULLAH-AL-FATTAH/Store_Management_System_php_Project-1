

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');
    require('myfunction.php');

?>



<!DOCTYPE html>

<html>
	<head>
		<title>Spend Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['spend_product_name']))
			{
    			$spend_product_name	    = $_GET['spend_product_name'];
    			$spend_product_quantity   = $_GET['spend_product_quantity'];
    			$spend_product_entry_date       = $_GET['spend_product_entry_date'];
    			

			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "INSERT INTO spend_product (spend_product_name, spend_product_quantity, spend_product_entry_date) 
                        VALUES ('$spend_product_name', '$spend_product_quantity', '$spend_product_entry_date')";
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
			
			Spend Product :<br>
            <select name="spend_product_name">
                <?php
                    
                    data_list('product', 'product_id', 'product_name');

                ?>
                
                

            </select><br><br>
			
			Spend Product Quantity:<br> 
			<input type="text" name="spend_product_quantity"><br><br>
			Spend Product Entry Date : <br>
			<input type="date" name="spend_product_entry_date"><br><br>

            <input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>