<h3>Category</h3>
<div class="content-data">
	<div class="content-form">
		<form method="post">
			<a href="<?php echo base_url('admin/category'); ?>"><h4>Add Category</h4></a>
			<h4>Update Category</h4>
			<input type="hidden" name="category_id" value="<?php echo $detail['category_id'] ?>">
			<div class="form-group">
				<label>Category</label>
				<input type="text" name="category_name" value="<?php echo $detail['category_name'] ?>">
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Update Category">
			</div>
		</form>
	</div>
	<div class="content-detail">
		<h4>All Categories</h4>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Category</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($category as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['category_name'] ?></td>
						<td>
							<a href="<?php echo base_url('admin/category/update/'.$value['category_id']) ?>">Update</a>
							<a href="<?php echo base_url('admin/category/delete/'.$value['category_id']) ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>