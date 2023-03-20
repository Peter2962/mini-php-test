<?php render('partials/header.php'); ?>

<div class='container mt-5' style='max-width: 400px;'>
	<form method='POST' action='/shop/create-item'>
		<div class="form-group">
			<input type="text" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary mt-3">Submit</button>
	</form>
</div>

<?php render('partials/footer.php'); ?>