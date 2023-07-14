<div class="breadcrumb">
	<ul>
		<li><a href="<?php echo base_url('') ?>">Home</a></li>
		<li> / </li>
		<li><a href="<?php echo base_url('catalog') ?>">Catalog</a></li>
		<li> / </li>
		<li>Cart</li>
	</ul>
</div>

<h2>Shopping Cart</h2>
<div class="cart-page">
		<div class="cart-items">
			<table>
				<thead>
					<tr>
						<th colspan="3">Cart Items</th>
					</tr>
				</thead>
				<tbody>
					<?php $product	= 0; ?>
					<?php $item		= 0; ?>
					<?php $total	= 0; ?>
					<?php foreach ($cart as $key => $value): ?>
						<tr>
							<td style="width: 20%;"><img src="<?php echo base_url('assets/img/product/'.$value['product_image']) ?>"></td>
							<td style="width: 60%;">
								<h2><?php echo $value['product_name'] ?></h2>
								<h3>Price: Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</h3>
								<br>
								<a href="<?php echo base_url('cart/delete/'.$value['cart_id']) ?>">x</a> Remove
							</td>
							<td class="qty" style="width: 15%;">
								<div class="prev">-</div>
								<div class="next">+</div>
								<input type="number" name="cartNumber" class="cartNumber" value="<?php echo $value['cart_qty'] ?>" min="1" max="<?php echo $value['product_stock'] ?>">
								<br><br>
								<h3>Rp. <?php echo number_format($value['product_price']*$value['cart_qty'], 0, ',', '.') ?>,-</h3>
							</td>
						</tr>
						<?php $product	+= 1 ?>
						<?php $item		+= $value['cart_qty'] ?>
						<?php $total	+= $value['product_price']*$value['cart_qty'] ?>
					<?php endforeach ?>
				</tbody>	
			</table>
		</div>
		<div class="cart-summary">
			<div class="checkout-total">
				<h3>Cart Summary</h3>
				<ul>
					<li>Number of Products x <?php echo $product ?></li>
					<li>Number of items x <?php echo $item ?></li>
					<hr>
					<li>Cart Total <span style="float: right;">Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</span></li>
					<li><a href="<?php echo base_url('checkout') ?>">Go to Checkout</a></li>
				</ul>
			</div>
		</div>
	</div>