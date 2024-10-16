<?php

require_once 'Http.php';

Http::get( '/produto/find/{id}', 'ProdutoController@find' );
Http::get( '/produto/findAll', 'ProdutoController@findAll' );
Http::post( '/produto/addProduto', 'ProdutoController@adicionarProduto' );
Http::put( '/produto/edit', 'ProdutoController@editarProduto' );
Http::delete( '/produto/delete/{id}', 'ProdutoController@delProduto' );
//falando que vai receber um id

Http::get( '/categoria/find/{id}', 'CategoriaController@find' );
Http::get( '/categoria/findAll', 'CategoriaController@findAll' );
Http::post( '/categoria/addCategoria', 'CategoriaController@adicionarCategoria' );
Http::put( '/categoria/editCategoria', 'CategoriaController@editarCategoria' );
Http::delete( '/categoria/deleteCategoria/{id}', 'CategoriaController@delCategoria' );

Http::get( '/areaatuacao/find/{id}', 'AreaAtuacaoController@find' );
Http::get( '/cursoareaAtuacao/findAll', 'AreaAtuacaoController@findAll' );
Http::post( '/areaatuacao/addareaAtuacao', 'AreaAtuacaoController@adicionarareaAtuacao' );
Http::put( '/areaatuacao/editareaAtuacao', 'AreaAtuacaoController@editarareaAtuacao' );
Http::delete( '/areaatuacao/deleteareaAtuacao/{id}', 'AreaAtuacaoController@delareaAtuacao' );

Http::get( '/curso/find/{id}', 'CursoController@find' );
Http::get( '/curso/findAll', 'CursoController@findAll' );
Http::post( '/curso/addCurso', 'CursoController@adicionarCurso' );
Http::put( '/curso/editCurso', 'CursoController@editarCurso' );
Http::delete( '/curso/deleteCurso/{id}', 'CursoController@delCurso' );