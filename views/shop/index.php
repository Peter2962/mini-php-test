<?php render('partials/header.php'); ?>

<div class='container mt-5'>
	<div class="btn-group">
		<a href='/shop/create-item' type="button" class="btn btn-primary">
			Create new item
		</a>
	</div>

	<div class='mt-3'>
		<table class="table table-borderless">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php render('partials/footer.php'); ?>