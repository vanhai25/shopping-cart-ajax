<?php 
if(isset($_SESSION['iduser'])){
	echo $_SESSION['nameuser'];
}
?>
<div class="container" style="margin: 200px auto" align="center">
	
	<div class="box" style="width: 500px; padding: 20px; border: 1px solid #cccccccc; ">
		<h3>Đăng nhập tài khoản</h3>
		<div id="mess"></div>
		<form method="POST">
			<input type="text" name="name" class="name">
			<input type="password" name="pass" class="pass">
			<button style="margin:30px" type="button" class="login">Đăng nhập</button>
		</form>
	</div>
</div>