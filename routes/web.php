<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'Home'
    ]);

/*-----------------------------------------------------------*/
    Route::get('trabajos', [
        'uses' => 'TrabajosController@index',
        'as' => 'trabajos.index'
    ]);

    Route::get('trabajos/{id}', [
        'uses' => 'TrabajosController@ver',
        'as' => 'trabajos.ver'
    ])->where('id', '\d+');

    Route::get('trabajos/nuevo', [
        'uses' => 'TrabajosController@formNuevo',
        'as' => 'trabajos.form-nuevo'
    ]);

    Route::post('trabajos/nuevo', [
        'uses' => 'TrabajosController@crear',
        'as' => 'trabajos.crear'
    ]);


    Route::post('trabajos/nuevo2', [
        'uses' => 'TrabajosController@formNuevo2',
        'as' => 'trabajos.form-nuevo2'
    ]);





    Route::delete('trabajos/{id}', [
        'uses' => 'TrabajosController@borrar',
        'as' => 'trabajos.borrar'
    ]);

    Route::get('trabajos/{trabajo}/editar', [
        'uses' => 'TrabajosController@formEditar',
        'as' => 'trabajos.form-editar'
    ]);

    Route::put('trabajos/{trabajo}/editar', [
          'uses' => 'TrabajosController@editar',
          'as' => 'trabajos.editar'
      ]);

/*-----------------------------------------------------------*/

    Route::get('clientes', [
        'uses' => 'ClientesController@index',
        'as' => 'clientes.index'
    ]);

    Route::get('clientes/{id}', [
        'uses' => 'ClientesController@ver',
        'as' => 'clientes.ver'
    ])->where('id', '\d+');

    Route::get('clientes/nuevo', [
        'uses' => 'ClientesController@formNuevo',
        'as' => 'clientes.form-nuevo'
    ]);

    Route::post('clientes/nuevo', [
        'uses' => 'ClientesController@crear',
        'as' => 'clientes.crear'
    ]);

    Route::delete('clientes/{id}', [
        'uses' => 'ClientesController@borrar',
        'as' => 'clientes.borrar'
    ]);

    Route::get('clientes/{cliente}/editar', [
        'uses' => 'ClientesController@formEditar',
        'as' => 'clientes.form-editar'
    ]);

    Route::put('clientes/{cliente}/editar', [
          'uses' => 'ClientesController@editar',
          'as' => 'clientes.editar'
      ]);

/*-----------------------------------------------------------*/
    Route::get('servicios', [
        'uses' => 'ServiciosController@index',
        'as' => 'servicios.index'
    ]);

    Route::get('servicios/{id}', [
        'uses' => 'ServiciosController@ver',
        'as' => 'servicios.ver'
    ])->where('id', '\d+');

    Route::get('servicios/nuevo', [
        'uses' => 'ServiciosController@formNuevo',
        'as' => 'servicios.form-nuevo'
    ]);

    Route::post('servicios/nuevo', [
        'uses' => 'ServiciosController@crear',
        'as' => 'servicios.crear'
    ]);

    Route::delete('servicio/{id}', [
        'uses' => 'ServiciosController@borrar',
        'as' => 'servicios.borrar'
    ]);

    Route::get('servicio/{servicio}/editar', [
        'uses' => 'ServiciosController@formEditar',
        'as' => 'servicios.form-editar'
    ]);

    Route::put('servicios/{servicio}/editar', [
          'uses' => 'ServiciosController@editar',
          'as' => 'servicios.editar'
      ]);



/*-----------------------------------------------------------*/
    Route::get('usuarios', [
        'uses' => 'UsuariosController@index',
        'as' => 'usuarios.index'
    ]);

    Route::get('usuarios/{id}', [
        'uses' => 'UsuariosController@ver',
        'as' => 'usuarios.ver'
    ])->where('id', '\d+');

    Route::get('usuarios/nuevo', [
        'uses' => 'UsuariosController@formNuevo',
        'as' => 'usuarios.form-nuevo'
    ]);

    Route::post('usuarios/nuevo', [
        'uses' => 'UsuariosController@crear',
        'as' => 'usuarios.crear'
    ]);

    Route::delete('usuarios/{id}', [
        'uses' => 'UsuariosController@borrar',
        'as' => 'usuarios.borrar'
    ]);

    Route::get('usuarios/{usuario}/editar', [
        'uses' => 'UsuariosController@formEditar',
        'as' => 'usuarios.form-editar'
    ]);

    Route::put('usuarios/{usuario}/editar', [
          'uses' => 'UsuariosController@editar',
          'as' => 'usuarios.editar'
      ]); 


/*-----------------------------------------------------------*/

    Route::get('pagos/traerUsuarios', [
        'uses' => 'TrabajosController@traerUsuarios',
        'as' => 'trabajos.traerUsuarios'
    ]);

    Route::get('pagos/{trabajo}', [
        'uses' => 'TrabajosController@formPago',
        'as' => 'trabajos.form-pagos'
    ]);

    Route::put('pagos/{trabajo}/editar', [
          'uses' => 'TrabajosController@editarPago',
          'as' => 'pagos.editar'
      ]);

    Route::get('cobros/{trabajo}', [
        'uses' => 'TrabajosController@formCobro',
        'as' => 'trabajos.form-cobros'
    ]);

    Route::put('cobros/{trabajo}/editar', [
          'uses' => 'TrabajosController@editarCobro',
          'as' => 'cobros.editar'
      ]);

/*-----------------------------------------------------------*/

    Route::get('renovaciones/{trabajo}/nuevo', [
        'uses' => 'RenovacionesController@formNuevo',
        'as' => 'renovaciones.form-nuevo'
    ]);

    Route::post('renovaciones/{trabajo}/nuevo', [
        'uses' => 'RenovacionesController@crear',
        'as' => 'renovaciones.crear'
    ]);

    Route::delete('renovaciones/{trabajo}', [
        'uses' => 'RenovacionesController@borrar',
        'as' => 'renovaciones.borrar'
    ]);

    Route::get('renovaciones/{trabajo}/editar', [
        'uses' => 'RenovacionesController@formEditar',
        'as' => 'renovaciones.form-editar'
    ]);

    Route::put('renovaciones/{trabajo}/editar', [
          'uses' => 'RenovacionesController@editar',
          'as' => 'renovaciones.editar'
      ]);