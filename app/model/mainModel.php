<?php 
class mainModel extends DBConnect{
	function getProduct(){
		$sql = "SELECT *
				FROM table_product
				ORDER BY id DESC
		";
		return $this->getMoreRows($sql);
	}
	function getCatalog(){
		$sql = "SELECT *
				FROM table_catalog
				ORDER BY id DESC
		";
		return $this->getMoreRows($sql);
	}
	function getProductById($id){
		$sql = "SELECT * 
				FROM table_product
				WHERE id =$id
		";
		return $this->getOneRow($sql);
	}
	function login($name,$pass){
		$sql = "SELECT *
				FROM table_user
				WHERE name = '$name'
				AND pass = '$pass'
		";
		return $this->getOneRow($sql);
	}
	function setCustom($name,$adr,$tel,$mail){
		$sql = "INSERT INTO table_custom(name,adr,tel,mail)
				VALUES('$name','$adr','$tel','$mail')
			
		";
		$check = $this->executeQuery($sql);
		if($check){
			return $this->getRecentIdInsert();
		}
		return false;
	}
	function setBill($id_custom,$total){
		$sql = "INSERT INTO table_bill(id_custom,total)
				VALUES($id_custom,'$total')
		";
		$check = $this->executeQuery($sql);
		if($check){
			return $this->getRecentIdInsert();
		}
		return false;
	}
	function setBillDetail($idBill,$idProduct,$qty,$option = null){
		$sql = "INSERT INTO table_bill_detail(idBill,idProduct,quantity,option_product)
				VALUES($idBill,$idProduct,'$qty','$option')
		";
		return $this->executeQuery($sql);
	}
	function getOptionColor($id_product){
		$sql = "SELECT c.*
				FROM table_product_color pc 
				INNER JOIN table_color c ON c.id = pc.id_color
				WHERE id_product = $id_product
		";
		return $this->getMoreRows($sql);
	}
	function getOptionSize($id_product){
		$sql = "SELECT s.*
				FROM table_product_size ps
				INNER JOIN table_size s ON s.id = ps.id_size
				WHERE id_product = $id_product
		";
		return $this->getMoreRows($sql);
	}
}
?>