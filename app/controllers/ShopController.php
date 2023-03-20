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

	public function showEditForm()
	{
		$id = $_GET['id'];
		$shop = new Shop();
		$result = $shop->findOne(['id' => $id]);

		$item = $result[0];

		render('shop/edit.php', [
			'item' => $item
		]);
	}

	public function updateItem()
	{
		$shop = new Shop();
		$shop->update(
			[
				'name' => $_POST['name']
			],
			[
				'id' => $_POST['id']
			]
		);

		header('Location: /shop');
	}

}