

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
		<title>Edit Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
            if(isset($_GET['id'])){
                $getid  =   $_GET['id'];

                $sql = "SELECT *FROM product WHERE product_id = $getid";

				$query   = $conn->query($sql);

				$data = mysqli_fetch_assoc($query);



				$product_id	            = $data['product_id'];
				$product_name           = $data['product_name'];
				$product_category       = $data['product_category'];
				$product_code           = $data['product_code'];
				$product_entry_date     = $data['product_entry_date'];
            }


            if(isset($_GET['product_name']))
                {

                $new_product_name       = $_GET['product_name'];
                $new_product_category       = $_GET['product_category'];
                $new_product_code           = $_GET['product_code'];
                $new_product_entry_date     = $_GET['product_entry_date'];
                $new_product_id             = $_GET['product_id'];

                $sql1 = "UPDATE product SET  product_name='$new_product_name', 
                                            product_category='$new_product_category',
                                            product_code='$new_product_code', 
                                            product_entry_date='$new_product_entry_date'
                 
                  WHERE product_id=$new_product_id";


                // $query1 = $conn->query($sql1);

                if($conn->query($sql1)===TRUE){
                    echo 'Data Updated Successfully!';
                }
                else{
                    echo 'Not Updated';
                }
            }
		?>

 <?php
    $sql = "SELECT * FROM category";
    $query = $conn->query($sql);
 ?>


        
<!-----------------------------Task:1  form for input data start-------------------------------------------->

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			
            Product :<br>
			<input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>

			Product Category:<br>
            <select name="product_category">
                <?php
                    while ($data = mysqli_fetch_array($query))
                        {
                                $category_id = $data['category_id'];
                                $category_name = $data['category_name'];
                        
                 ?>
                <option value='<?php echo $category_id ?>' <?php if($category_id == $product_category) {echo 'selected';} ?> >
                    <?php echo $category_name ?> 
                </option>
                        
               <?php } ?>
                
            </select><br><br>
			
			Product code:<br> 
			<input type="text" name="product_code"  value="<?php echo $product_code ?>"><br><br>

			Product Entry Date : <br>
			<input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"><br><br>
			
            Product ID : <br>
			<input type="text" name="product_id" value="<?php echo $product_id ?>" hidden ><br><br>

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