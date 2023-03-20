<?php

$router->get('/shop', ['ShopController', 'index'], 'items.list');
$router->get('/shop/create-item', ['ShopController', 'showCreateForm'], 'items.show-create-form');
$router->post('/shop/create-item', ['ShopController', 'createItem'], 'items.create');
$router->get('/shop/edit', ['ShopController', 'showEditForm'], 'items.show-edit-form');
$router->post('/shop/update-item', ['ShopController', 'updateItem'], 'items.update-edit');