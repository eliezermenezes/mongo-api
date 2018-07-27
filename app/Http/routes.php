<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function ($app) {

    $app->group(['prefix' => 'usuario'], function ($usuario) {
        $usuario->post('', 'UsuarioController@addUsuario');
        $usuario->get('', 'UsuarioController@getUsuarios');
        $usuario->get('/{id}', 'UsuarioController@getUsuarioById');
        $usuario->put('/{id}', 'UsuarioController@updateUsuario');
        $usuario->delete('/{id}', 'UsuarioController@deletaUsuario');
    });

    $app->group(['prefix' => 'empresa'], function ($empresa) {
        $empresa->post('', 'EmpresaController@addEmpresa');
        $empresa->get('', 'EmpresaController@getEmpresas');
        $empresa->get('/{id}', 'EmpresaController@getEmpresaById');
        $empresa->put('/{id}', 'EmpresaController@updateEmpresa');
        $empresa->delete('/{id}', 'EmpresaController@deletaEmpresa');
    });

    $app->group(['prefix' => 'endereco'], function ($endereco) {
        $endereco->post('', 'EnderecoController@addEndereco');
        $endereco->get('', 'EnderecoController@getEnderecos');
        $endereco->get('/{id}', 'EnderecoController@getEnderecoById');
        $endereco->put('/{id}', 'EnderecoController@updateEndereco');
        $endereco->delete('/{id}', 'EnderecoController@deletaEndereco');
    });

    $app->group(['prefix' => 'area'], function ($area) {
        $area->post('', 'AreaConhecimentoController@addArea');
        $area->get('', 'AreaConhecimentoController@getAreas');
        $area->get('/{id}', 'AreaConhecimentoController@getAreaById');
        $area->put('/{id}', 'AreaConhecimentoController@updateArea');
        $area->delete('/{id}', 'AreaConhecimentoController@deletaArea');
    });

    $app->group(['prefix' => 'vaga'], function ($vaga) {
        $vaga->post('', 'VagaController@addVaga');
        $vaga->get('', 'VagaController@getVagas');
        $vaga->get('/{id}', 'VagaController@getVagaById');
        $vaga->put('/{id}', 'VagaController@updateVaga');
        $vaga->delete('/{id}', 'VagaController@deletaVaga');
    });

});