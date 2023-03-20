<?php

namespace App\Controllers;

use App\Models\Shop;

class ShopController
{

	public function index()
	{
		render('shop/index.php', [

		]);
	}

	public function showCreateForm()
	{
		render('shop/create.php', [

		]);
	}

}