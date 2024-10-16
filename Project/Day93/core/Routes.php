<?php

require_once 'Http.php';

Http::get( '/veiculos/find/{id}', 'VeiculoController@find' );
Http::get( '/veiculos/findAll', 'VeiculoController@findAll' );
Http::post( '/veiculos/addVeiculo', 'VeiculoController@addVeiculo' );
Http::put( '/veiculos/edit', 'VeiculoController@editarVeiculo' );
Http::delete( '/veiculos/delete/{id}', 'VeiculoController@delVeiculo' );