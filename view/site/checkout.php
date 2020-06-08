	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Checkout
			</span>
		</div>
	</div>
	<?php if(isset($err)) echo $err; ?>
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<form method="POST">
				<div class="title">CHECKOUT</div>
			<div class="row" style="margin:20px 30px; ">
				
				
					<div class="col-md-6">
						<div class="form-group">
						    <label for="email">Họ tên:</label>
						    <input type="text" name="name" class="form-control" placeholder="Họ tên" id="name">
						</div>
						<div class="form-group">
						    <label for="email">Địa chỉ</label>
						    <input type="text" name="adr" class="form-control" placeholder="Địa chỉ" id="texxt">
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" name="mail" class="form-control" placeholder="Enter email" id="email">
						</div>
						<div class="form-group">
						    <label for="email">Số điện thoại</label>
						    <input type="number" name="tel" class="form-control" placeholder="Số điện thoại" id="email">
						</div>
					</div>
				
			</div>
			<button type="submit" name="sm" style="padding: 5px 10px; background:#CA6F1E; color:white"> Đặt hàng</button>
			</form>
		</div>
	</div>