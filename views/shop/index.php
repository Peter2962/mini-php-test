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
				</tr>
			</thead>
			<tbody>
				<?php foreach($items as $item): ?>
					<tr>
						<th scope="row"><?= $item['id'] ?></th>
						<td><?= $item['name']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php render('partials/footer.php'); ?>