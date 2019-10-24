<?php 
	include 'model/model.php';
	class Controller {
		public function handleRequest() {
			$action = isset($_GET['action'])?$_GET['action']:'home';
			$model = new Model();
			switch ($action) {
				case 'home':
					include 'view/home.php';
					break;
				case 'news':
					include 'view/news.php';
					break;
				case 'products':
				  	$productList = $model->getProductList();
					include 'view/products.php';
					break;
				case 'contact':
					include 'view/contact.php';
					break;
				case 'addProduct':
					include 'view/addProduct.php';
					break;
				case 'submitAddProduct':
					$this->AddProduct();
					break;
				case 'EditProduct':
					$product = $this->GetProduct();
					include 'view/editProduct.php';
					break;
				case 'submitEditProduct':
					$this->EditProduct();
					break;
				case 'DeleteProduct':
					$this->DeleteProduct();
					break;
				default:
					include 'view/home.php';
					break;
			}
		}

		public function GetProduct(){
			$model = new Model();
			$record = $model->getProduct($_GET['id']);
			$product = mysqli_fetch_array($record);
			return $product;
		}

		public function AddProduct(){
			$model = new Model();
			if(isset($_POST['submitAddProduct']))
			{
				$model->AddProduct($_POST['title'],$_POST['description'],$_POST['price']);
				header("Location: index.php?action=products");
				exit;
			}
		}

		public function EditProduct(){
			$model = new Model();
			if(isset($_POST['submitEditProduct']))
			{
				$model->EditProduct($_POST['id'], $_POST['title'],$_POST['description'],$_POST['price']);
				header("Location: index.php?action=products");
				exit;
			}
		}

		public function DeleteProduct(){
			$model = new Model();
			$model->DeleteProduct($_GET['id']);
			header("Location: index.php?action=products");
			exit;
		}
	}
?>
