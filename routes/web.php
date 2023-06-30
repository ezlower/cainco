<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('Auth.login');
// });

Route::get('/', function () {
    return view('welcome');
});
Route::get('estudiante-list-pdf', 'EstudiantesController@exportPdf')->name('estudiantes.pdf');

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('estudiantes', 'EstudiantesController')->middleware('auth');
    Route::resource('matriculas', 'MatriculasController');
    Route::resource('periodos', 'PeriodosController');
    Route::resource('rangos', 'RangosController');
    Route::resource('cursos', 'CursosController');
    Route::resource('notas', 'NotasController');
    Route::name('imprimir')->get('/imprimir-pdf','Controller@imprimir');
    Route::resource('docentes', 'DocentesController');

});






Route::resource('codigo', 'CodigoController');