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
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($items as $item): ?>
					<tr>
						<th scope="row"><?= $item['id'] ?></th>
						<td><?= $item['name']; ?></td>
						<td>
							<a href="/shop/edit?id=<?= $item['id'] ?>" class='btn btn-primary mt-3'>Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php render('partials/footer.php'); ?>