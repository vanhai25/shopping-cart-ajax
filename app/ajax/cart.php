<?php 
session_start();
if(isset($_POST['action'])){
	if($_POST['action'] == 'add'){
		// nếu có giỏ hàng 
		if(!empty($_SESSION['cart'])){
			//tạo biến nhằm mục đích xem sản phẩm đó đã có trong gio hang chưa
			$is = 0;
			foreach($_SESSION['cart'] as $keys => $values){
				// kiểm tra sản phẩm này đã có trong giỏ hàng không
				if($_SESSION['cart'][$keys]['product_id'] == $_POST['product_id']){
					// biển đó sẽ tăng dần nếu sản phẩm đó đã tồn tại
					$is++;
					// thì số lượng củ sản phẩm đó công thêm số lượng nhận
					$_SESSION['cart'][$keys]['product_quantity'] = $_SESSION['cart'][$keys]['product_quantity'] + $_POST['product_quantity'];
				}
			}
			//nếu biển đó default thì sản phẩm đó chưa tồn tại trong giỏ hàng
			if($is == 0){
				$item_array = array(
					'product_id' => $_POST['product_id'],
					'product_name' => $_POST['product_name'],
					'product_img' => $_POST['product_img'],
					'product_price' => $_POST['product_price'],
					'product_quantity' => $_POST['product_quantity'],
					'product_size' => $_POST['product_size'],
					'product_color' => $_POST['product_color']
				);
				$_SESSION['cart'][] = $item_array;
			}
			


		}
		// nếu không tạo session chưa mảng giỏ hàng
		else{
			$item_array = array(
				'product_id' => $_POST['product_id'],
				'product_name' => $_POST['product_name'],
				'product_img' => $_POST['product_img'],
				'product_price' => $_POST['product_price'],
				'product_quantity' => $_POST['product_quantity'],
				'product_size' => $_POST['product_size'],
				'product_color' => $_POST['product_color']
			);

			// gắn mảng cho session cart
			$_SESSION['cart'][] = $item_array;
		}
	}
	//  nếu action là remove thì xoá giỏ hàng
	if($_POST['action'] == 'remove'){
		foreach($_SESSION['cart'] as $keys => $values){
			if($values['product_id'] == $_POST['product_id']){
				unset($_SESSION['cart'][$keys]);
				
			}
		}
	}
	//  nếu action là update thì sửa giỏ hàng
	if($_POST['action'] == 'update'){
		foreach($_SESSION['cart'] as $keys => $values){
			if($values['product_id'] == $_POST['product_id']){
				$_SESSION['cart'][$keys]['product_quantity'] = $_POST['product_quantity'];
				// xem số lượng  âm thì mặc định  1
				if($_POST['product_quantity'] < 0){
					$_SESSION['cart'][$keys]['product_quantity'] = 1;
				}
				// xem số lượng bằng 0 thì xoá luôn
				if($_SESSION['cart'][$keys]['product_quantity'] == 0){
					unset($_SESSION['cart'][$keys]);
				}
				// xem số lượng lớn hơn 10 thì mặc định  10
				if($_POST['product_quantity'] >= 10){
					$_SESSION['cart'][$keys]['product_quantity'] = 10;
				}
				
			}
		}
	}

}
// tính tổng tiền trong giỏ hàng 
if(!empty($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $key => $value) {
		$total += $value['product_price'] * $value['product_quantity'];
	}
	$_SESSION['total_cart'] = $total;
}
else{
	$_SESSION['total_cart'] = 0;
}

?>