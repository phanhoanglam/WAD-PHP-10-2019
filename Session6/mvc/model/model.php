<?php 
	include 'config/database.php';
 class Model extends Connect {
 		public function getNews() {
 			return 'news get from db';
 		}

 		public function getProductList() {
 			$sql = "SELECT * FROM products";
 			return mysqli_query($this->connect(), $sql);
		}

		public function getProduct($Id) {
			$sql = "SELECT * FROM products WHERE Id = $Id";
			return mysqli_query($this->connect(), $sql);
	   }

		public function AddProduct($Title, $Description, $Price){
			$created = date('Y-m-d H:i:s');
            $sql = "INSERT INTO products(Title, Description, price, created) 
            VALUES ('$Title','$Description', '$Price','$created')";
 			return mysqli_query($this->connect(), $sql);
		}
		
		public function EditProduct($Id, $Title, $Description, $Price){
			$updated = date('Y-m-d H:i:s');
            $sql = "UPDATE products SET Title = '$Title', Description = '$Description', Price = '$Price', Updated = '$updated' WHERE Id = $Id";
 			return mysqli_query($this->connect(), $sql);
		}
		
		public function DeleteProduct($Id){
            $sql = "DELETE FROM products WHERE Id = $Id";
 			return mysqli_query($this->connect(), $sql);
        }
 }
?>