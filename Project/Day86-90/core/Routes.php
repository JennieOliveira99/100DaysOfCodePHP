<?php

require_once 'Http.php';

Http::get('/produto/find/{id}', 'ProdutoController@find');
Http::get('/produto/findAll', 'ProdutoController@findAll');
Http::post('/produto/addProduto', 'ProdutoController@adicionarProduto');
Http::put('/produto/edit', 'ProdutoController@editarProduto');
Http::delete('/produto/delete/{id}', 'ProdutoController@delProduto');//falando que vai receber um id

Http::get('/categoria/find/{id}', 'CategoriaController@find');
Http::get('/categoria/findAll', 'CategoriaController@findAll');
Http::post('/categoria/addCategoria', 'CategoriaController@adicionarCategoria');
Http::put('/categoria/editCategoria', 'CategoriaController@editarCategoria');
Http::delete('/categoria/deleteCategoria/{id}', 'CategoriaController@delCategoria');


