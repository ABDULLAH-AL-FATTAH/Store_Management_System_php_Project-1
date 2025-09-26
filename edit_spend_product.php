

<?php 
    
    //php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
    
    require('connection.php');
    require('myfunction.php');

?>



<!DOCTYPE html>

<html>
	<head>
		<title>Edit Spend Product</title>
	</head>
	<body>

        <!-- Task-2 database table insert by OOP and SQL insert start----------------->


		<?php
			if(isset($_GET['id'])){
                $getid  =   $_GET['id'];

                $sql = "SELECT *FROM spend_product WHERE spend_product_id  = $getid";

				$query   = $conn->query($sql);

				$data = mysqli_fetch_assoc($query);



				 $spend_product_id	            = $data['spend_product_id'];
				 $spend_product_name            = $data['spend_product_name'];
				 $spend_product_quantity        = $data['spend_product_quantity'];
				 $spend_product_entry_date      = $data['spend_product_entry_date'];
            }

            if(isset($_GET['spend_product_name']))
                {

                    $new_spend_product_name           = $_GET['spend_product_name'];
                    $new_spend_product_quantity       = $_GET['spend_product_quantity'];               
                    $new_spend_product_entry_date     = $_GET['spend_product_entry_date'];
                    $new_spend_product_id             = $_GET['spend_product_id'];

                $sql1 = "UPDATE spend_product SET  spend_product_name='$new_spend_product_name', 
                                            spend_product_quantity='$new_spend_product_quantity',
                                            spend_product_entry_date='$new_spend_product_entry_date'
                  WHERE spend_product_id=$new_spend_product_id";


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
            <select name="spend_product_name">
                <?php
                    
                     $sql = "SELECT * FROM product";
                     $query = $conn->query($sql);


                    while ($data = mysqli_fetch_array($query))
                        {
                                $data_id = $data['product_id'];
                                $data_name = $data['product_name'];
                   ?>     
                    <option value='<?php echo $data_id ?>' <?php if($spend_product_name == $data_id) {echo 'Selected';} ?>>
                    
                    <?php echo $data_name ?>
                    
                    </option>
                    <?php   } ?>
                
                
            </select><br><br>
			
			Product Quantity:<br> 
			<input type="number" name="spend_product_quantity" value="<?php echo $spend_product_quantity; ?>">  <br><br>
			Product Entry Date : <br>
			<input type="date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date; ?>"> <br><br>


			<input type="text" name="spend_product_id" value="<?php echo $spend_product_id ?>"Hidden> 

            <input type="submit" value="submit">
		</form>
<!-----------------------------Task:1 form for input data End------------------------------------------>
	</body>



<!-----------------------------Task:1 form for input data End----------------------------------->
</html>