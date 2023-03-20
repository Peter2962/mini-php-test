<?php

$router->get('/shop', ['ShopController', 'index'], 'items.list');
$router->get('/shop/create-item', ['ShopController', 'showCreateForm'], 'items.show-create-form');