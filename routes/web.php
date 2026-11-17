<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

//Definicion basica de rutas
Route::get('/hola', function(){
    $nombre = "David";
    return "Hola, {$nombre}";
});

/*Parametros en las rutas
    Parametros requeridos
Route::get('/usuario/{nombre}', function($nombre){
    return "Usuario: $nombre";
});*/

//Parametro con valor por defecto
Route::get('/usuario/{nombre?}', function($nombre = 'Default'){
    return "Usuario: $nombre";
});

/*Redirigir rutas
Route::redirect('/ruta-anterior','/ruta-nueva');*/

Route::get('/ruta-nueva', function(){
    return "Ruta nueva";
});

//env(): Permite obtener las variables de entorno

Route::get('/db', function(){
    return env('DB_CONNECTION');
});

//dd(): Depuracion rapida, imprime el conteo de una variable que se pasa por parametro
Route::get('/dd', function(){
    $nombre = "Rendon";
    dd($nombre);
    return env('DB_CONNECTION');
});

//config(): Accede a la configuracion de la aplicacion
Route::get('/app', function(){
    return config('app.timezone');
});

/*Vistas
Route::view('/producto','almacen.producto'); //Forma 1, utilizando el metodo view*/

Route::get('/producto', function(){ //Forma 2, utilizando el metodo get
    return view('almacen.producto');
});

/*PASAR DATOS A LA VISTA: Se puede desde el controlador o desde una ruta a la vista,
se debe utilizar un arreglo asociativo de claves y valores*/

//Con 1 parametro

/*Route::get('/producto1', function(){
    return view('almacen.producto1', ['nombre'=>'Impresora Lexcmark MS610']);
});
*/

Route::get('/producto1', function(){
    return view('almacen.producto1', ['nombre'=>'Impresora Lexcmark MS610', 'marca'=>'Lexcmark']);
});

Route::get('condicional/{nota}', function($nota){
    return view('estructuras.condicional', compact('nota'));
});

Route::get('control/{numero}', function($numero){
    return view('estructuras.switch', compact('numero'));
});

Route::get('while/{numero}', function($numero){
    return view('estructuras.while', compact('numero'));
});

Route::get('/foreach', function(){
    $lista = ["Impresora","Disco duro","Monitor","Teclado"];
    return view('estructuras.foreach', compact('lista'));
});


Route::get('probar-conexion',function(){
    try {
        DB::connection()->getPdo();
        return "Conexion a la base de datos exitosa";
    }catch (\Exception $e){
        return "No se puede conectar a la base de datos. <br> Error: ".$e->getMessage();
    }
});

//QUERY
//OBTENER DATOS
Route::get('query', function(){
    $productos= DB::table('productos')->get();
    return $productos;
});
//Obtener el primer registro
Route::get('find', function(){
    $productos= DB::table('productos')->first();
    return $productos;
});

//Filtrado de datos
Route::get('filtro1', function(){
    $productos= DB::table('productos')
        ->where('categoria_codigo', 1)
        ->where('descripcion','LIKE','Y%')->get();
        return $productos;
});

Route::get('filtro2', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','precio')
        ->where('precio', 2500)
        //->where('precio','>','2500')
        ->get();
    return $productos;
});

Route::get('filtro3', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','created_at')
        ->wherenull('created_at')
        ->get();
    return $productos;
});

Route::get('filtro4', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','created_at')
        ->whereNotNull('created_at')
        ->get();
    return $productos;
});

Route::get('filtro5', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','created_at')
        ->whereIn('codigo', [3,5,6])
        ->get();
    return $productos;
});

Route::get('filtro6', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','created_at')
        ->whereNotIn('codigo', [3,4])
        ->get();
    return $productos;
});

Route::get('filtro7', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','precio')
        ->whereBetween('precio', [2500,20000])
        ->get();
    return $productos;
});

Route::get('filtro8', function(){
    $productos= DB::table('productos')
        ->select('codigo','descripcion','precio')
        ->whereNotBetween('precio', [2500,20000])
        ->get();
    return $productos;
});

//FILTRADO DE DATOS CON JOIN
Route::get('join', function(){
    $productos= DB::table('productos')
        ->join('categorias','productos.categoria_codigo','=','categorias.codigo')
        ->select('productos.codigo','productos.descripcion','productos.precio',
        'categorias.nom_categoria')
        ->get();
    return $productos;
});

Route::get('leftjoin', function(){
    $productos= DB::table('categorias')
        ->leftjoin('productos',
                'categorias.codigo','=',
                'productos.categoria_codigo')
        ->select('categorias.nom_categoria',
                 'productos.codigo',
                 'productos.descripcion',
                 'productos.precio')
        ->get();
    return $productos;
});