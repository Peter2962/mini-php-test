<?php

namespace App\Controllers;

use App\Models\Shop;

class ShopController
{

	public function index()
	{
		$shop = new Shop();
		$items = $shop->all();

		render('shop/index.php', [
			'items' => $items
		]);
	}

	public function showCreateForm()
	{
		render('shop/create.php');
	}

	public function createItem()
	{
		$shop = new Shop();
		$shop->insert([
			'name' => $_POST['name']
		]);

		header('Location: /shop');
	}

}