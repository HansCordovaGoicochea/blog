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
//
//Route::get('/', function () {
//    return view('welcome');
//});

//Aqui se puede definir las rutas de la pagina web
//Ejemplo >>>>
//    www.mi-site.com = Route::get('/');
//    www.mi-site.com/contacto = Route::get('contacto', function(){//esto vera el usuario en el navegador});

//ruta para el home con controller

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludo/{nombre?}', ['as' => 'saludo', 'uses' => 'PagesController@saludo']);


Route::resource('mensajes', 'MensajesController');

Route::resource('usuarios', 'UsersController');

//\App\User::create([
//   'name' => 'Administrador',
//   'email' => 'h@ache.com',
//    'password' => bcrypt('123'),
//
//]);
//\App\User::create([
//   'name' => 'Moderador',
//   'email' => 'es@ache.com',
//    'password' => bcrypt('123'),
//
//]);

//\App\User::create([
//   'name' => 'Estudiante',
//   'email' => 'estu@ache.com',
//    'password' => bcrypt('123'),
//
//]);

//\App\Role::create([
//   'clave' => 'admin',
//   'nombre' => 'Administr',
//    'descripcion' => "Rol de administrador"
//
//]);
//\App\Role::create([
//   'clave' => 'mod',
//   'nombre' => 'Moderador',
//    'descripcion' => "Rol de moderador"
//
//]);
//\App\Role::create([
//   'clave' => 'estudiante',
//   'nombre' => 'Estudiante',
//    'descripcion' => "Rol de moderador"
//
//]);

//Route::get('roles', function (){
//   return \App\Role::with('user')->get();
//});

//Login
//Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('login',['as' => 'login' , 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');


//Logout
Route::get('logout', 'Auth\LoginController@logout');






















//
//Route::get('/', function (){
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a><br>";
//    echo "<a href='".Route('contacto')."'>Contacto</a>";
//
//});
//
//Route::get('contactame', ['as' => 'contacto', function (){
//    return "Holaaaaaaa desde contacto";
//}]);
////parametro no obligatorio se agrega un signo de interrogacion al final del parametro
//Route::get('saludos/{nombre?}', function ($nombre = "Invitado"){
//    return "Saludos $nombre";
//})->where('nombre', "[A-Za-z]*"); // solo letras


