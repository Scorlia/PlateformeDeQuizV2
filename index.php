<?php
require_once 'vendor/autoload.php';
require_once 'Modeles/Question.php';
require_once 'Modeles/Reponse.php';
require_once 'Modeles/Resultat.php';
require_once 'Controleurs/QuestionController.php';
require_once 'Controleurs/ReponseController.php';
require_once 'Controleurs/ResultatController.php';
require_once 'Vues/Vue.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['Vue', 'genererVue', ['accueil']]);
    $r->addRoute('GET', '/quiz', ['QuestionController', 'afficherQuiz']);
    $r->addRoute('POST', '/verifierReponse', ['ReponseController', 'verifierReponse']);
    $r->addRoute('GET', '/resultat', ['ResultatController', 'afficherResultat']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($controller, $action) = $handler;
        call_user_func_array([new $controller, $action], $vars);
        break;
}
