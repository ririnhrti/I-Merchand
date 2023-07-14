<h3>Product</h3>
<div class="content-data">
	<div class="content-form">
		<form method="post" enctype="multipart/form-data">
			<h4>Add Product</h4>
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="product_name">
			</div>
			<div class="form-inline">
				<div class="form-group">
					<label>Category</label>
					<select name="category_id">
						<option>---Select a Category---</option>
						<?php foreach ($category as $key => $value): ?>
							<option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Product Gender</label>
					<select name="product_gender">
						<option>---Select a Gender---</option>
						<option value="">No Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Unisex">Unisex</option>
					</select>
				</div>
			</div>
			<div class="form-inline">
				<div class="form-group">
					<label>Product Price</label>
					<input type="number" name="product_price">
				</div>
				<div class="form-group">
					<label>Product Stock</label>
					<input type="number" name="product_stock">
				</div>
			</div>
			<div class="form-group">
				<label>Product Show</label>
				<input type="text" name="product_show">
			</div>
			<div class="form-group">
				<label>Product Description</label>
				<textarea style="resize:none" name="product_overview" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Product Image</label>
				<input type="file" name="product_image">
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Add Product">
			</div>
		</form>
	</div>
	<div class="content-detail">
		<h4>All Products</h4>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Category</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Price</th>
					<th>Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($product as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['category_name'] ?></td>
						<td><?php echo $value['product_name'] ?></td>
						<td><?php echo $value['product_gender'] ?></td>
						<td>Rp. <?php echo number_format($value['product_price'], 0, ',', '.') ?>,-</td>
						<td><?php echo $value['product_stock'] ?></td>
						<td>
							<a href="<?php echo base_url('admin/product/update/'.$value['product_id']) ?>">Update</a>
							<a href="<?php echo base_url('admin/product/delete/'.$value['product_id']) ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>