<?php

namespace App\Commands;

use Core\Db\Model;

class Setup
{

	public function execute($args)
	{
		echo "Running setup \n";
		$model = new Model();
		$cursor = $model->cursor();

		$cursor->query('DROP TABLE shop');
		echo '- Dropped table: shop';

		echo "\n";

		// create default table
		$query = "CREATE TABLE shop (
			id INT(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL
		)";

		if ($model->cursor()->query($query)) {
			echo '- Created table: shop';
		}

		echo "\n";
		echo 'Setup complete';
	}

}