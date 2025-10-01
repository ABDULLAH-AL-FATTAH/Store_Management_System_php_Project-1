

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');

	//session : login-logout system এর জন্য session start করতে হবে। part-1 Start
    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

     if(! empty($user_first_name) && ! empty($user_last_name) ){
    
	//session: login-logout system এর জন্য session start করতে হবে। part-1 end





    require('myfunction.php');

?>



<!DOCTYPE html>

<html>
	<head>
		<title>store Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['store_product_name']))
			{
    			$store_product_name	    = $_GET['store_product_name'];
    			$store_product_quantity   = $_GET['store_product_quantity'];
    			$store_product_entry_date       = $_GET['store_product_entry_date'];
    			

			//now we are going to entry data for above categories of the Category table in our phpmysql using SQL

			     $sql= "INSERT INTO store_product (store_product_name, store_product_quantity, store_product_entry_date) 
                        VALUES ('$store_product_name', '$store_product_quantity', '$store_product_entry_date')";
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
			
			Product :<br>
            <select name="store_product_name">
                <?php
                    
                    data_list('product', 'product_id', 'product_name');

                ?>
                
                

            </select><br><br>
			
			Product Quantity:<br> 
			<input type="text" name="store_product_quantity"><br><br>
			Product Entry Date : <br>
			<input type="date" name="store_product_entry_date"><br><br>

            <input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>


<?php
	 }
	 else{
	   header('location: login.php');
	 }
 ?>