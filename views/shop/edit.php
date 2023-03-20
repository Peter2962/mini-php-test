<?php render('partials/header.php'); ?>

<div class='container mt-5' style='max-width: 400px;'>
	<form method='POST' action='/shop/update-item'>
		<div class='form-group'>
			<input type='text' value="<?= $item['name'] ?>" name='name' class='form-control'>
			<input type="hidden" name="id" value="<?= $item['id'] ?>">
		</div>
		<button type='submit' class='btn btn-primary mt-3'>Submit</button>
	</form>
</div>

<?php render('partials/footer.php'); ?>