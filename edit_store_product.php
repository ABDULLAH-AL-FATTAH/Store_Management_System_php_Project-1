

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
		<title>Edit store Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['id'])){
                $getid  =   $_GET['id'];

                $sql = "SELECT *FROM store_product WHERE store_product_id  = $getid";

				$query   = $conn->query($sql);

				$data = mysqli_fetch_assoc($query);



				$store_product_id	            = $data['store_product_id'];
				$store_product_name             = $data['store_product_name'];
				$store_product_quantity         = $data['store_product_quantity'];
				$store_product_entry_date       = $data['store_product_entry_date'];
            }

            if(isset($_GET['store_product_name']))
                {

                    $new_store_product_name           = $_GET['store_product_name'];
                    $new_store_product_quantity       = $_GET['store_product_quantity'];               
                    $new_store_product_entry_date     = $_GET['store_product_entry_date'];
                    $new_store_product_id             = $_GET['store_product_id'];

                $sql1 = "UPDATE store_product SET  store_product_name='$new_store_product_name', 
                                            store_product_quantity='$new_store_product_quantity',
                                            store_product_entry_date='$new_store_product_entry_date'
                  WHERE store_product_id=$new_store_product_id";


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
			
			Product :<br>
            <select name="store_product_name">
                <?php
                    
                     $sql = "SELECT * FROM product";
                     $query = $conn->query($sql);


                    while ($data = mysqli_fetch_array($query))
                        {
                                $data_id = $data['product_id'];
                                $data_name = $data['product_name'];
                   ?>     
                    <option value='<?php echo $data_id ?>' <?php if($store_product_name == $data_id) {echo 'Selected';} ?>>
                    
                    <?php echo $data_name ?>
                    
                    </option>
                    <?php   } ?>
                
                
            </select><br><br>
			
			Product Quantity:<br> 
			<input type="number" name="store_product_quantity" value="<?php echo $store_product_quantity; ?>">  <br><br>
			Product Entry Date : <br>
			<input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date; ?>"> <br><br>


			<input type="text" name="store_product_id" value="<?php echo $store_product_id ?>"Hidden> 

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