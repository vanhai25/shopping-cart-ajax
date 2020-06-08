<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 'home';
}


switch ($page) {
	case 'home':
		
		$data = $model->getProduct();
		$catalog = $model->getCatalog();
		require_once 'view/site/home.php';
		break;

	case 'product':
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$pro = $model->getProductById($id);
			$size = $model->getOptionSize($pro->id);
			$color = $model->getOptionColor($pro->id);
		}
		require_once 'view/site/product.php';
		break;
	case 'cart':
		require_once 'view/site/cart.php';
		break;
	case 'checkout':
		if(isset($_POST['sm'])){
			$err = array();
			if(empty($_POST['name'])) $err[] =  'name'; else $name = $_POST['name'];
			if(empty($_POST['adr'])) $err[] =  'adr'; else $adr = $_POST['adr'];
			if(empty($_POST['tel'])) $err[] =  'tel'; else $tel = $_POST['tel'];
			if(empty($_POST['mail'])) $err[] =  'mail'; else $mail = $_POST['mail'];
			if(empty($err)){
				$id_custom = $model->setCustom($name,$adr,$tel,$mail);
				if($id_custom){
					$total = $_SESSION['total_cart'];
					$idBill = $model->setBill($id_custom,$total);
					if($idBill){
						foreach($_SESSION['cart'] as $key => $values){
							$idProduct = $values['product_id'];
							$qty = $values['product_quantity'];
							$option = $values['product_size'].' '.$values['product_color'];
							$bill_detail = $model->setBillDetail($idBill,$idProduct,$qty,$option); 
						}
						unset($_SESSION['cart']);
						unset($_SESSION['total_cart']);
						$err = 'success';
					}
				}
			}
			else{
				$err = 'Ghi chưa đủ bạn ơi';
			}
		}
		require_once 'view/site/checkout.php';
		break;
	
	default:
		# code...
		break;
}

?>