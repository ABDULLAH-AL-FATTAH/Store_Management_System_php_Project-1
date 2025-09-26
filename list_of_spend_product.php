
<?php 
	
	//php 'include' and 'require' topic should be understand from the following link https://www.w3schools.com/php/php_includes.asp // 
	
	require('connection.php');

        $sql1    =   "SELECT * FROM product";
        $query1  =   $conn->query($sql1);

        $data_list = array();

       while ($data1   =   mysqli_fetch_assoc($query1))
       {

            $product_id       =   $data1['product_id'];
            $product_name     =   $data1['product_name'];

            $data_list[$product_id] = $product_name;
            
       }
        
      
 ?>

  <!-----------------------------Task:4.1 php to mysql database connection php segment End ----------------------------------------->				

	<!---------------------php to mysql database connection end------------------->


<!DOCTYPE html>

<html>
	<head>
		<title>List of Spend Product</title>
	</head>
	<body>
			<!-----------------------------Task:4.2 Now we are going to show the Information of the database ----------------------->	
		<?php
			//here we use php mysql Database 'SELECT Data'> Example(MySQLi Object-Oriented) link: https://www.w3schools.com/php/php_mysql_select.asp (follow the link to understand)
			

			$sql="SELECT * FROM spend_product";

			$query = $conn->query($sql);

			echo "<table border='1'>
                <tr><th>Product Name</th><th>Quantity</th><th>Entry Date</th><th>Action</th></tr>";

			while ( $data = mysqli_fetch_assoc($query)) {
				 
				 $spend_product_id	            = $data['spend_product_id'];
				 $spend_product_name            = $data['spend_product_name'];
				 $spend_product_quantity        = $data['spend_product_quantity'];
				 $spend_product_entry_date      = $data['spend_product_entry_date'];

				 echo "<tr>
				 			<td>$data_list[$spend_product_name]</td>
                            <td>$spend_product_quantity</td>
				 			<td>$spend_product_entry_date</td>
				 			<td><a href='edit_spend_product.php?id=$spend_product_id'>Edit</a></td>
				 	  </tr>"; 
				 	  //here we've created one more coloum as Edit and linking it's associative php file that edit_category.php
			}

			echo "</table>";
		?>
	</body>



</html>