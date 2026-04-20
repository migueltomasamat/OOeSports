<?php

include_once "vendor/autoload.php";

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controller\TorneoController;
use App\Controller\EquipoController;
use App\Controller\JugadorController;


$router = new RouteCollector();


$router->get('/',function (){
    include_once "app/View/principal.php";
});

$router->get('/torneo',[TorneoController::class,'index']);
$router->get('/torneo/create',[TorneoController::class,'create']);
$router->get('/torneo/{idTorneo}',[TorneoController::class,'show']);

$router->post('/torneo',[TorneoController::class,'store']);
$router->get('/torneo/{idTorneo}/edit',[TorneoController::class,'edit']);
$router->put('/torneo/{idTorneo}',[TorneoController::class,'update']);
$router->delete('/torneo',[TorneoController::class,'delete']);

$router->get('/equipo',[EquipoController::class,'index']);
$router->get('/equipo/create',[EquipoController::class,'create']);

$router->get('/equipo/{id}',[EquipoController::class,'show']);
$router->post('/equipo',[EquipoController::class,'store']);
$router->get('/equipo/{id}/edit',[EquipoController::class,'edit']);
$router->put('/equipo/{id}',[EquipoController::class,'update']);
$router->delete('/equipo',[EquipoController::class,'delete']);


$router->get('/jugador',[JugadorController::class,'index']);
$router->get('/jugador/create',[JugadorController::class,'create']);

$router->get('/jugador/{id}',[JugadorController::class,'show']);
$router->post('/jugador',[JugadorController::class,'store']);
$router->get('/jugador/{id}/edit',[JugadorController::class,'edit']);
$router->put('/jugador/{id}',[JugadorController::class,'update']);
$router->delete('/jugador',[JugadorController::class,'delete']);


//Resolución de rutas
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}
catch(HttpRouteNotFoundException $e){
    return "Ruta no encontrada";
}
// Print out the value returned from the dispatched function
echo $response;
