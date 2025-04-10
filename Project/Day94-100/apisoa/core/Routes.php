<?php

require_once 'Http.php';



//rotas Pacientes
Http::get('/pacientes/find/{id}', 'PacientesController@find');
Http::get('/pacientes/findAll','PacientesController@findAll');
Http::post('/pacientes/add','PacientesController@addPacientes');
Http::delete('/pacientes/deletar/{id}','PacientesController@deletarPacientes');
Http::put('/pacientes/alterar','PacientesController@alterarPacientes');


//rotas
Http::get('/fabricantes/find/{id}', 'FabricantesController@find');
Http::get('/fabricantes/findAll','FabricantesController@findAll');
Http::post('/fabricantes/add','FabricantesController@addFabricantes');
Http::delete('/fabricantes/deletar/{id}','FabricantesController@deletarFabricantes');
Http::put('/fabricantes/alterar','FabricantesController@alterarFabricantes');

//rotas
Http::get('/celular/find/{id}', 'CelularController@find');
Http::get('/celular/findAll','CelularController@findAll');
Http::post('/celular/add','CelularController@addCelular');
Http::delete('/celular/deletar/{id}','CelularController@deletarCelular');
Http::put('/celular/alterar','CelularController@alterarCelular');


//rotas
Http::get('/cidade/find/{id}', 'CidadeController@find');
Http::get('/cidade/findAll','CidadeController@findAll');
Http::post('/cidade/add','CidadeController@addCidade');
Http::delete('/cidade/deletar/{id}','CidadeController@deletarCidade');
Http::put('/cidade/alterar','CidadeController@editCidade');
Http::get('/cidade/finduf/{id}', 'CidadeController@findPorUf');


Http::post('/usuario/addPerfil', 'UsuarioController@addPerfil');
Http::put('/usuario/editarPerfil', 'UsuarioController@editarPerfil');
Http::get('/usuario/find/{id}', 'UsuarioController@find');
Http::get('/usuario/findAll', 'UsuarioController@findAll');
Http::delete('/usuario/deletar/{id}', 'UsuarioController@deletarUsuario');

//aqui primeiro vem como deve ser a rota no insominia e depois qual função da controller essa rota chama

