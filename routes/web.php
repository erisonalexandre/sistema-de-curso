<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/professores','ProfessoresController@index')->name('listar_professores');
Route::get('/professores/create','ProfessoresController@create');
Route::post('/professores','ProfessoresController@store');
Route::delete('/professores/{id_professor}','ProfessoresController@destroy');
Route::get('/professores/{id_professor}','ProfessoresController@edit');
Route::put('/professores/{id_professor}','ProfessoresController@update');

Route::get('/alunos','AlunosController@index')->name('listar_alunos');
Route::get('/alunos/create','AlunosController@create');
Route::post('/alunos','AlunosController@store');
Route::delete('/alunos/{id_aluno}','AlunosController@destroy');
Route::get('/alunos/{id_aluno}','AlunosController@edit');
Route::put('/alunos/{id_aluno}','AlunosController@update');

Route::get('/cursos','CursosController@index')->name('listar_cursos');
Route::get('/cursos/create','CursosController@create');
Route::post('/cursos','CursosController@store');
Route::delete('/cursos/{id_curso}','CursosController@destroy');
Route::get('/cursos/{id_curso}','CursosController@edit');
Route::put('/cursos/{id_curso}','CursosController@update');

Route::get('/relatorios','RelatoriosController@index');
Route::get('/relatorio/pdf','RelatoriosController@gerarPDF');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
